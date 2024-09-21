#!/bin/bash

# Set variables
PLUGIN_FILE="elementor-pagination-nofollow.php"
ZIP_FILE="elementor-pagination-nofollow.zip"

# Check if plugin file exists
if [ ! -f "$PLUGIN_FILE" ]; then
    echo "Error: Plugin file not found: $PLUGIN_FILE"
    exit 1
fi

# Create zip file
zip "$ZIP_FILE" "$PLUGIN_FILE"

echo "Plugin zipped successfully: $ZIP_FILE"