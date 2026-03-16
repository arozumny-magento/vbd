#!/usr/bin/env node

/**
 * Build script that compiles SCSS and combines it with the theme header in style.css
 */

const { execSync } = require('child_process');
const fs = require('fs');
const path = require('path');

const themeDir = __dirname;
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

console.log('🔨 Compiling SCSS...');

try {
    execSync(`npx sass "${scssFile}" "${tempCssFile}" --style=compressed --source-map`, {
        stdio: 'inherit',
        cwd: themeDir
    });

    let compiledCss = fs.readFileSync(tempCssFile, 'utf8');
    compiledCss = compiledCss.replace(/^\uFEFF/, '').replace(/^\u200B/, '');
    compiledCss = compiledCss.replace(/sourceMappingURL=main\.css\.map/g, 'sourceMappingURL=style.css.map');

    fs.writeFileSync(styleCssFile, themeHeader + compiledCss, 'utf8');

    if (fs.existsSync(tempMapFile)) {
        let sourceMap = JSON.parse(fs.readFileSync(tempMapFile, 'utf8'));
        sourceMap.sources = sourceMap.sources.map(source => {
            if (source.startsWith('../../src/scss/')) {
                return source.replace('../../src/scss/', 'src/scss/');
            }
            return source;
        });
        sourceMap.file = 'style.css';
        fs.writeFileSync(styleMapFile, JSON.stringify(sourceMap, null, 2), 'utf8');
    }

    console.log('✅ Build complete! Styles compiled to style.css with source map');
} catch (error) {
    console.error('❌ Build failed:', error.message);
    process.exit(1);
}
