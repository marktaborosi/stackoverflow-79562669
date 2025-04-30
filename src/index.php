<?php

/**
 * Applies a perspective-transformed banner onto a base image (e.g., a truck)
 * and saves the composited output.
 *
 * This function uses Imagick to:
 * - Load a base image (e.g., truck),
 * - Load and resize a banner image,
 * - Apply a perspective distortion to the banner,
 * - Composite it onto a specific location on the base image.
 *
 * @param string $basePath     Path to the base image (e.g., the truck image).
 * @param string $bannerPath   Path to the banner image to apply.
 * @param string $outputPath   Path where the final output image will be saved.
 *
 * @throws ImagickException if image loading, distortion, or saving fails.
 */
function mergeWithPerspective(string $basePath, string $bannerPath, string $outputPath): void {
    $imagick = new Imagick(realpath($basePath));
    $banner = new Imagick(realpath($bannerPath));

    // Resize banner to fixed dimensions for consistent perspective mapping
    $banner->resizeImage(230, 300, Imagick::FILTER_LANCZOS, 1);

    // Map corners of the banner to positions on the truck's black panel
    $controlPoints = [
        0, 0,        496, 145,
        230, 0,      715, 163,
        0, 300,      495, 407,
        230, 300,    712, 375
    ];

    $banner->setImageVirtualPixelMethod(Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
    $banner->distortImage(Imagick::DISTORTION_PERSPECTIVE, $controlPoints, true);

    // Composite the distorted banner onto the truck image at a specific offset
    $imagick->compositeImage($banner, Imagick::COMPOSITE_OVER, 507, 110);

    $imagick->writeImage($outputPath);
    $imagick->clear();
}


// Usage
try {
    mergeWithPerspective('./source-images/4.jpg', './source-images/71jnk8L5-vL._SX679_.jpg', './processed/output.png');
} catch (ImagickException $e) {
    die($e);
}