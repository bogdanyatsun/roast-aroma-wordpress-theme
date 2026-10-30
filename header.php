<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roast & Aroma | Specialty Coffee & Artisan Bakery</title>
    <link rel="icon"
        href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Ctext y='.9em' font-size='90'%3E☕%3C/text%3E%3C/svg%3E">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <?php wp_head(); ?>
</head>

<body class="font-sans bg-coffee-cream text-[#1f1a17] antialiased overflow-x-hidden">

    <!-- Navigation -->
    <header class="sticky top-0 z-50 bg-coffee-cream/90 backdrop-blur-md border-b border-[#e8e1d7]">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="font-serif text-2xl font-bold text-coffee-dark flex items-center gap-2">
                Roast <span class="text-coffee-accent">&</span> Aroma
            </a>
            <nav>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'hidden md:flex items-center gap-8 list-none',
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>
            <button
                class="open-booking-btn bg-coffee-accent hover:bg-coffee-hover text-white text-sm font-semibold px-6 py-2.5 rounded-full shadow-md shadow-coffee-accent/20 transition-all duration-300 hover:-translate-y-0.5 cursor-pointer">
                Reserve a Table
            </button>
        </div>
    </header>