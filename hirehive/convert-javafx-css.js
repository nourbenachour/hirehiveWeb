#!/usr/bin/env node
/**
 * convert-javafx-css.js
 * Usage: node convert-javafx-css.js <javafx-css-folder> <out-file>
 * Converts JavaFX CSS properties to standard CSS
 */
const fs = require("fs");
const path = require("path");

const srcDir = process.argv[2];
const outFile = process.argv[3] || "assets/styles/javafx.css";

if (!srcDir) {
  console.error("Usage: node convert-javafx-css.js <javafx-css-folder> [out-file]");
  process.exit(1);
}

if (!fs.existsSync(srcDir)) {
  console.error(`Source directory not found: ${srcDir}`);
  process.exit(1);
}

const propMap = {
  "-fx-background-color": "background-color",
  "-fx-background-radius": "border-radius",
  "-fx-border-color": "border-color",
  "-fx-border-width": "border-width",
  "-fx-border-radius": "border-radius",
  "-fx-text-fill": "color",
  "-fx-font-size": "font-size",
  "-fx-font-weight": "font-weight",
  "-fx-font-family": "font-family",
  "-fx-padding": "padding",
  "-fx-hgap": "column-gap",
  "-fx-vgap": "row-gap",
  "-fx-pref-width": "width",
  "-fx-pref-height": "height",
  "-fx-min-width": "min-width",
  "-fx-min-height": "min-height",
  "-fx-max-width": "max-width",
  "-fx-max-height": "max-height",
  "-fx-alignment": "align-items",
  "-fx-cursor": "cursor",
  "-fx-effect": "box-shadow"
};

const numericToPx = value =>
  value.split(/\s+/).map(v => (/^-?\d+(\.\d+)?$/.test(v) ? `${v}px` : v)).join(" ");

const translateLine = line => {
  const m = line.match(/^\s*([-\w]+)\s*:\s*([^;]+);/);
  if (!m) return line;
  const [, prop, rawVal] = m;
  const mapped = propMap[prop];
  if (!mapped) return line.startsWith("-fx-") ? "" : line;
  let val = rawVal.trim();
  if (["padding","margin","border-width","border-radius","width","height","min-width","min-height","max-width","max-height","column-gap","row-gap","font-size"].includes(mapped)) {
    val = numericToPx(val);
  }
  if (prop === "-fx-effect" && /dropshadow/i.test(val)) {
    const parts = val.match(/dropshadow\(gaussian,\s*([^,]+),\s*([^,]+),\s*[^,]+,\s*([^,]+),\s*([^)]+)\)/i);
    if (parts) {
      const [, color, radius, dx, dy] = parts;
      val = `${dx.trim()}px ${dy.trim()}px ${radius.trim()}px ${color.trim()}`;
    }
  }
  return line.replace(prop, mapped).replace(rawVal, val);
};

try {
  const cssFiles = fs.readdirSync(srcDir).filter(f => f.endsWith(".css"));
  if (cssFiles.length === 0) {
    console.warn(`No CSS files found in ${srcDir}`);
  }
  
  const out = cssFiles.map(file => {
    const lines = fs.readFileSync(path.join(srcDir, file), "utf8").split(/\r?\n/);
    return lines.map(translateLine).filter(Boolean).join("\n");
  }).join("\n\n/* --- next file --- */\n\n");

  fs.writeFileSync(outFile, out, "utf8");
  console.log(`✓ Converted ${cssFiles.length} files -> ${outFile}`);
} catch (err) {
  console.error("Error during conversion:", err.message);
  process.exit(1);
}
