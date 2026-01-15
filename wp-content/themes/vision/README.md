# Vision WordPress Theme

A clean and lightweight WordPress theme based on the Vision Business Development design.

## Features

- Clean and lightweight codebase
- SCSS support with npm build system
- Responsive design
- WordPress best practices
- Custom home page template

## Development Setup

### Prerequisites

- Node.js and npm installed
- WordPress installation

### Installation

1. Navigate to the theme directory:
```bash
cd wp-content/themes/vision
```

2. Install npm dependencies:
```bash
npm install
```

### SCSS Compilation

#### Build (Production)
Compiles SCSS to minified CSS and updates `style.css` with theme header:
```bash
npm run build
```

#### Watch (Development)
Watches for SCSS changes and automatically compiles to `style.css`:
```bash
npm run watch
```
This will:
- Watch all SCSS files in `src/scss/`
- Automatically compile when files change
- Update `style.css` with the WordPress theme header preserved
- Use expanded CSS format for easier debugging

Press `Ctrl+C` to stop watching.

#### Dev (Development)
Same as `watch` - watches for changes and updates `style.css`:
```bash
npm run dev
```

## Theme Structure

```
vision/
├── assets/
│   ├── css/          # Compiled CSS files
│   └── js/           # JavaScript files
├── src/
│   └── scss/         # SCSS source files
│       ├── components/
│       ├── main.scss
│       ├── _base.scss
│       ├── _layout.scss
│       ├── _utilities.scss
│       └── _variables.scss
├── functions.php     # Theme functions
├── header.php        # Header template
├── footer.php        # Footer template
├── index.php         # Main template
├── page-home.php     # Home page template
├── style.css         # Theme stylesheet (required)
└── package.json      # npm configuration
```

## Page Templates

### Home Template

To use the home page template:
1. Create a new page in WordPress
2. Select "Home" from the Page Template dropdown
3. Publish the page
4. Set it as your homepage in Settings > Reading

## Customization

### Colors

Edit `src/scss/_variables.scss` to customize theme colors.

### Typography

Edit `src/scss/_base.scss` to customize typography.

### Components

Individual component styles are in `src/scss/components/`.

## License

GPL-2.0 or later
