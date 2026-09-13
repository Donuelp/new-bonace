<?php
$pages = ['components', 'necklaces', 'clutches', 'bangles', 'earrings', 'shoes', 'beaded-bags'];

$remove_patterns = [
    '/\.page-layout\s*\{.*?\}/s',
    '/\.sidebar\s*\{.*?\}/s',
    '/\.sidebar__title\s*\{.*?\}/s',
    '/\.sidebar__list\s*\{.*?\}/s',
    '/\.sidebar__list\s+li\s*\{.*?\}/s',
    '/\.sidebar__list\s+a\s*\{.*?\}/s',
    '/\.sidebar__list\s+a::after\s*\{.*?\}/s',
    '/\.sidebar__list\s+a:hover\s*\{.*?\}/s',
    '/\.sidebar__list\s+a:hover::after\s*\{.*?\}/s',
    '/\.sidebar__list\s+a\.is-active\s*\{.*?\}/s',
    '/\.sidebar__list\s+a\.is-active::after\s*\{.*?\}/s',
    '/\.sidebar__divider\s*\{.*?\}/s',
    '/\.page-content\s*\{.*?\}/s',
    '/\.product-grid\s*\{.*?margin:\s*2rem\s+auto;.*?\}/s',
    '/\.product-grid\s*\{.*?padding:\s*0;.*?\}/s',
    '/\.product-grid\s*\{.*?max-width:\s*calc\(var\(--container\)\);.*?\}/s',
    '/\.product-grid\s*>\s*:last-child\s*\{.*?\}/s',
    '/\.product-card\s*\{.*?\}/s',
    '/\.product-card\s+img\s*\{.*?\}/s',
    '/\.product-card:hover\s+img\s*\{.*?\}/s',
    '/\.product-card__overlay\s*\{.*?\}/s',
    '/\.product-card__overlay\s+h3\s*\{.*?\}/s',
];

$replacements = [];

foreach ($pages as $name) {
    $path = "resources/views/{$name}.blade.php";
    $content = file_get_contents($path);
    
    // Remove .page-layout > section CSS
    $content = preg_replace('/\.page-layout\s*>\s*section,\s*\.page-layout\s*>\s*\.product-grid\s*\{.*?\}\s*/s', '', $content);
    
    // Remove all sidebar and page-layout related CSS blocks (they're inside media queries too)
    // Remove sidebar CSS from the main styles
    $content = preg_replace('/\.page-layout\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__title\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__list\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__list\s+li\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__list\s+a\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__list\s+a::after\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__list\s+a:hover\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__list\s+a:hover::after\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__list\s+a\.is-active\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__list\s+a\.is-active::after\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.sidebar__divider\s*\{[^}]*\}/s', '', $content);
    $content = preg_replace('/\.page-content\s*\{[^}]*\}/s', '', $content);
    
    // Remove @media query blocks that contain sidebar/page-layout
    $content = preg_replace('/@media\s*\(max-width:\s*980px\)\s*\{[^}]*page-layout[^}]*\}/s', '', $content);
    $content = preg_replace('/@media\s*\(max-width:\s*980px\)\s*\{[^}]*sidebar[^}]*\}/s', '', $content);
    $content = preg_replace('/@media\s*\(max-width:\s*720px\)\s*\{.*?\}/s', '', $content);
    
    // Clean up empty media queries
    $content = preg_replace('/@media\s*\(max-width:\s*980px\)\s*\{\s*\}/s', '', $content);
    $content = preg_replace('/@media\s*\(max-width:\s*720px\)\s*\{\s*\}/s', '', $content);
    
    // Remove @media query content that only has page-layout or sidebar styles
    // This is tricky - let me just handle it differently
    
    file_put_contents($path, $content);
    echo "CSS cleaned from: {$name}\n";
}
echo "Done!\n";
