#!/usr/bin/env node

/**
 * Watch script that compiles SCSS and updates style.css when files change
 */

const { execSync } = require('child_process');
const fs = require('fs');
const path = require('path');
const chokidar = require('chokidar');

const themeDir = __dirname;
const scssDir = path.join(themeDir, 'src/scss');
const scssFile = path.join(themeDir, 'src/scss/main.scss');
const tempCssFile = path.join(themeDir, 'assets/css/main.css');
const tempMapFile = path.join(themeDir, 'assets/css/main.css.map');
const styleCssFile = path.join(themeDir, 'style.css');
const styleMapFile = path.join(themeDir, 'style.css.map');

// Theme header that must be preserved
const themeHeader = `/*
Theme Name: Vision
Theme URI: https://visionbusinessdevelopment.com
Author: Vision Business Development
Author URI: https://visionbusinessdevelopment.com
Description: A clean and lightweight WordPress theme based on the Vision Business Development design.
Version: 2.0.0
Text Domain: vision
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: lightweight, clean, modern, responsive
*/

`;

/**
 * Compile SCSS and update style.css
 */
function compileAndUpdate() {
    try {
        console.log('🔨 Compiling SCSS...');
        
        // Compile SCSS to temp file (expanded for development) with source map
        execSync(`sass "${scssFile}" "${tempCssFile}" --style=expanded --source-map`, {
            stdio: 'inherit',
            cwd: themeDir
        });

        // Read compiled CSS
        let compiledCss = fs.readFileSync(tempCssFile, 'utf8');
        
        // Remove BOM (UTF-8 BOM is \uFEFF) and any leading ZWNBSP characters
        compiledCss = compiledCss.replace(/^\uFEFF/, '').replace(/^\u200B/, '');

        // Update source map reference in CSS to point to the correct location
        // Replace reference from main.css.map to style.css.map
        compiledCss = compiledCss.replace(/sourceMappingURL=main\.css\.map/g, 'sourceMappingURL=style.css.map');

        // Combine header + compiled CSS
        const finalCss = themeHeader + compiledCss;

        // Write to style.css
        fs.writeFileSync(styleCssFile, finalCss, 'utf8');

        // Update and copy source map if it exists
        if (fs.existsSync(tempMapFile)) {
            let sourceMap = JSON.parse(fs.readFileSync(tempMapFile, 'utf8'));
            
            // Update source map paths to be relative to style.css location
            sourceMap.sources = sourceMap.sources.map(source => {
                // Adjust paths to be relative to theme root
                if (source.startsWith('../../src/scss/')) {
                    return source.replace('../../src/scss/', 'src/scss/');
                }
                return source;
            });
            
            // Update file reference
            sourceMap.file = 'style.css';
            
            // Write updated source map
            fs.writeFileSync(styleMapFile, JSON.stringify(sourceMap, null, 2), 'utf8');
        }

        console.log('✅ Styles updated in style.css with source map');
    } catch (error) {
        console.error('❌ Compilation failed:', error.message);
    }
}

// Initial compilation
compileAndUpdate();

console.log('👀 Watching for SCSS changes...');
console.log('   Press Ctrl+C to stop\n');

// Watch SCSS files
const watcher = chokidar.watch(path.join(scssDir, '**/*.scss'), {
    ignored: /node_modules/,
    persistent: true,
    ignoreInitial: true
});

watcher
    .on('change', (filePath) => {
        console.log(`\n📝 File changed: ${path.relative(themeDir, filePath)}`);
        compileAndUpdate();
    })
    .on('error', (error) => {
        console.error('❌ Watcher error:', error);
    });

// Handle process termination
process.on('SIGINT', () => {
    console.log('\n\n👋 Stopping watch...');
    watcher.close();
    process.exit(0);
});
