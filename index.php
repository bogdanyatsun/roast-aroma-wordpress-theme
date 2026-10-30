   <?php get_header(); ?>

   <main>
       <!-- Hero Section -->
       <section class="py-16 md:py-24 overflow-hidden" id="about">
           <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
               <div class="lg:col-span-7">
                   <span
                       class="inline-block bg-coffee-accent/15 text-coffee-dark px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-5">
                       Artisan Specialty Roastery
                   </span>
                   <h1
                       class="font-serif text-4xl sm:text-5xl lg:text-[54px] font-bold leading-[1.15] text-coffee-dark mb-6">
                       Brewed with Passion, <em class="text-coffee-accent italic">Served with Heart.</em>
                   </h1>
                   <p class="text-[#463e37] text-base sm:text-lg leading-relaxed mb-9 max-w-lg">
                       Experience ethically sourced specialty beans roasted to perfection, accompanied by fresh
                       handmade
                       pastries baked daily in London.
                   </p>
                   <div class="flex flex-wrap items-center gap-4 mt-8">
                       <button
                           class="open-booking-btn bg-coffee-accent hover:bg-coffee-hover text-white font-semibold text-sm sm:text-base px-7 py-3.5 rounded-full shadow-lg shadow-coffee-accent/30 transition-all duration-300 hover:-translate-y-0.5 cursor-pointer">
                           Book Table Online
                       </button>
                       <a href="#menu"
                           class="inline-flex items-center justify-center border-2 border-coffee-dark text-coffee-dark hover:bg-coffee-dark hover:text-white font-semibold text-sm sm:text-base px-7 py-3.5 rounded-full transition-all duration-300 hover:-translate-y-0.5">
                           Explore Menu
                       </a>
                   </div>
               </div>
               <div class="lg:col-span-5 relative mt-8 lg:mt-0 w-full">
                   <img class="w-full h-115 object-cover rounded-3xl shadow-2xl shadow-coffee-dark/15 block"
                       src="<?php echo get_template_directory_uri(); ?>/images/hero-interior.webp"
                       alt="Specialty Coffee Shop Interior"
                       fetchpriority="high">

                   <!-- Floating Card -->
                   <div
                       class="absolute -bottom-6 left-4 sm:-left-6 bg-white py-4 px-6 rounded-2xl shadow-xl shadow-coffee-dark/10 flex items-center gap-4 border border-[#e8e1d7]/60">
                       <div class="text-2xl font-extrabold text-coffee-dark">⭐ 4.9</div>
                       <div>
                           <div class="text-sm font-bold text-[#1f1a17]">500+ Local Reviews</div>
                           <div class="text-xs text-[#463e37]">London's Favorite Roast</div>
                           <div class="text-xs text-[#463e37]">Portfolio Demo</div>
                       </div>
                   </div>
               </div>
           </div>
       </section>

       <!-- Menu Section -->
       <section class="py-20 md:py-28 bg-white border-y border-[#e8e1d7]" id="menu">
           <div class="max-w-6xl mx-auto px-6">
               <div class="text-center max-w-xl mx-auto mb-14">
                   <span
                       class="inline-block bg-coffee-accent/15 text-coffee-dark px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider mb-4">
                       Handcrafted Drinks
                   </span>
                   <h2 class="font-serif text-3xl sm:text-4xl md:text-[40px] font-bold text-coffee-dark mb-4">
                       Signature Coffee & Treats
                   </h2>
                   <p class="text-[#463e37] text-base sm:text-lg">
                       Carefully selected single-origin beans brewed by certified baristas.
                   </p>
               </div>

               <!-- Filter Tabs -->
               <div class="flex flex-wrap justify-center gap-3 mb-12" id="menuFilter">
                   <button type="button" data-filter="all"
                       class="menu-filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 cursor-pointer bg-coffee-dark text-white shadow-sm">
                       All
                   </button>
                   <button type="button" data-filter="coffee"
                       class="menu-filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 cursor-pointer bg-coffee-cream border border-[#e8e1d7] text-[#463e37] hover:border-coffee-dark">
                       Coffee
                   </button>
                   <button type="button" data-filter="treats"
                       class="menu-filter-btn px-5 py-2 rounded-full text-sm font-semibold transition-all duration-200 cursor-pointer bg-coffee-cream border border-[#e8e1d7] text-[#463e37] hover:border-coffee-dark">
                       Treats
                   </button>
               </div>

               <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                   <?php
                    $menu_items = new WP_Query(array(
                        'post_type'      => 'post',
                        'posts_per_page' => -1,
                        'category_name'  => 'coffee,treats',
                        'orderby'        => 'date',
                        'order'          => 'ASC'
                    ));

                    if ($menu_items->have_posts()) :
                        while ($menu_items->have_posts()) : $menu_items->the_row(); // для стандартного WP:
                            $menu_items->the_post();

                            // Определяем рубрику для фильтрации (coffee или treats)
                            $categories = get_the_category();
                            $category_slug = !empty($categories) ? $categories[0]->slug : 'coffee';

                            // Получаем цену из произвольного поля (если не задана, ставим прочерк)
                            $price = get_post_meta(get_the_ID(), 'price', true);
                            if (!$price) {
                                $price = '£0.00';
                            }
                    ?>
                           <div data-category="<?php echo esc_attr($category_slug); ?>"
                               class="bg-coffee-cream rounded-2xl overflow-hidden border border-[#e8e1d7] transition-all duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-coffee-dark/10 flex flex-col group">

                               <div class="overflow-hidden h-56">
                                   <?php if (has_post_thumbnail()) : ?>
                                       <?php the_post_thumbnail('medium_large', array(
                                            'class' => 'w-full h-56 object-cover transition-transform duration-500 group-hover:scale-105',
                                            'alt'   => get_the_title()
                                        )); ?>
                                   <?php else : ?>
                                       <img class="w-full h-56 object-cover"
                                           src="<?php echo get_template_directory_uri(); ?>/images/coffe-1.webp"
                                           alt="<?php the_title_attribute(); ?>">
                                   <?php endif; ?>
                               </div>

                               <div class="p-6 flex flex-col grow">
                                   <div class="flex justify-between items-baseline mb-2.5">
                                       <h3 class="font-serif text-xl font-bold text-coffee-dark"><?php the_title(); ?></h3>
                                       <span class="text-lg font-bold text-coffee-accent" data-price="<?php echo esc_attr(str_replace('£', '', $price)); ?>">
                                           <?php echo esc_html($price); ?>
                                       </span>
                                   </div>
                                   <div class="text-[16px] text-[#463e37] leading-relaxed mb-6 grow">
                                       <?php the_excerpt(); ?>
                                   </div>
                               </div>
                           </div>
                       <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        ?>
                       <p class="col-span-3 text-center text-[#463e37]">Позиции меню пока не добавлены.</p>
                   <?php endif; ?>
               </div>
           </div>
       </section>

       <!-- Features -->
       <section class="py-20 md:py-28" id="features">
           <div class="max-w-6xl mx-auto px-6">
               <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                   <div
                       class="bg-white p-9 rounded-2xl border border-[#e8e1d7] text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-coffee-dark/5 flex flex-col items-center">
                       <div class="text-4xl mb-5 inline-block">🌱</div>
                       <h3 class="font-serif text-xl font-bold text-coffee-dark mb-3">Direct-Trade Beans</h3>
                       <p class="text-[16px] text-[#463e37] leading-relaxed">
                           We work directly with sustainable farming cooperatives in Colombia, Ethiopia, and Guatemala.
                       </p>
                   </div>
                   <div
                       class="bg-white p-9 rounded-2xl border border-[#e8e1d7] text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-coffee-dark/5 flex flex-col items-center">
                       <div class="text-4xl mb-5 inline-block">🥐</div>
                       <h3 class="font-serif text-xl font-bold text-coffee-dark mb-3">Baked Fresh Daily</h3>
                       <p class="text-[16px] text-[#463e37] leading-relaxed">
                           All pastries and sourdough sandwiches are prepared every morning in our in-house micro
                           bakery.
                       </p>
                   </div>
                   <div
                       class="bg-white p-9 rounded-2xl border border-[#e8e1d7] text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-coffee-dark/5 flex flex-col items-center">
                       <div class="text-4xl mb-5 inline-block">💻</div>
                       <h3 class="font-serif text-xl font-bold text-coffee-dark mb-3">Warm & Work-Friendly</h3>
                       <p class="text-[16px] text-[#463e37] leading-relaxed">
                           Fast high-speed Wi-Fi, comfortable seating, and plugs for your productive remote work
                           sessions.
                       </p>
                   </div>
               </div>
           </div>
       </section>
   </main>

   <?php get_footer(); ?>