<!-- Footer -->
<footer id="contact" class="bg-coffee-dark text-[#dfd7cf] pt-16 pb-8">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 lg:gap-12 pb-12 border-b border-white/10">
            <div class="md:col-span-5 lg:col-span-6">
                <h3 class="font-serif text-2xl font-bold text-white mb-4">Roast & Aroma</h3>
                <p class="text-sm text-[#bfaea0] leading-relaxed max-w-sm">Your friendly neighbourhood specialty
                    coffee roastery and bakehouse. Serving community with
                    warmth and care since 2021.</p>
            </div>
            <div class="md:col-span-3 lg:col-span-3">
                <h4 class="font-serif text-lg font-semibold text-white mb-4">Opening Hours</h4>
                <p class="text-sm text-[#bfaea0] mb-2">Mon – Fri: 07:30 – 18:00</p>
                <p class="text-sm text-[#bfaea0] mb-2">Saturday: 08:30 – 19:00</p>
                <p class="text-sm text-[#bfaea0] mb-2">Sunday: 09:00 – 17:00</p>
            </div>
            <div class="md:col-span-4 lg:col-span-3">
                <h4 class="font-serif text-lg font-semibold text-white mb-4">Visit Us</h4>
                <p class="text-sm text-[#bfaea0] mb-2">
                    <a href="https://maps.google.com/?q=42+Baker+Street+London" target="_blank" rel="noopener"
                        class="hover:text-white transition-colors duration-200">
                        📍42 Baker Street, Marylebone<br>London W1U 7AL, United Kingdom
                    </a>
                </p>
                <p class="text-sm text-[#bfaea0] mb-2">
                    <a href="mailto:hello@roastaroma.co.uk" class="hover:text-white transition-colors duration-200">
                        ✉️ hello@roastaroma.co.uk
                    </a>
                </p>
                <p class="text-sm text-[#bfaea0] mb-2 flex items-center gap-2">
                    <span>📞</span>
                    <a href="tel:+442079460192" class="hover:text-white transition-colors duration-200">
                        +44 20 7946 0192
                    </a>
                </p>
            </div>
        </div>
        <div class="pt-8 text-center text-xs text-[#8c7b6f]">
            &copy; 2026 Roast & Aroma Coffee Ltd. All rights reserved. Built for digital preview.
        </div>
    </div>
</footer>

<!-- Modal Booking Form -->
<div class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs items-center justify-center p-4" id="bookingModal"
    style="display: none;">
    <div
        class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 relative shadow-2xl border border-[#e8e1d7] transform transition-all duration-300 scale-95 in-[.active]:scale-100">

        <button
            class="modal-close absolute top-4 right-4 sm:top-5 sm:right-5 w-9 h-9 flex items-center justify-center rounded-full text-2xl text-[#463e37] hover:text-coffee-dark hover:bg-coffee-cream transition-colors duration-200 cursor-pointer"
            id="closeModalBtn" aria-label="Close modal">&times;</button>

        <div id="modalFormContainer">
            <h3 class="font-serif text-2xl font-bold text-coffee-dark mb-1">Reserve Your Table</h3>
            <p class="text-[16px] text-[#463e37] mb-5">Save a spot or pre-order your favorite cup in advance.</p>

            <form id="reservationForm" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-coffee-dark mb-1.5">Full
                        Name</label>
                    <input type="text" name="fullName" placeholder="e.g. John Miller" required
                        class="w-full px-4 py-3 rounded-xl border border-[#e8e1d7] bg-coffee-cream text-sm text-[#1f1a17] focus:outline-none focus:border-coffee-accent focus:ring-2 focus:ring-coffee-accent/25 transition-all duration-200">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-coffee-dark mb-1.5">Phone
                        Number / WhatsApp</label>
                    <input type="tel" name="phone" placeholder="+44 7700 900077" required
                        class="w-full px-4 py-3 rounded-xl border border-[#e8e1d7] bg-coffee-cream text-sm text-[#1f1a17] focus:outline-none focus:border-coffee-accent focus:ring-2 focus:ring-coffee-accent/25 transition-all duration-200">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-coffee-dark mb-1.5">Date &
                        Time</label>
                    <input type="datetime-local" id="bookingDateTime" name="dateTime" required
                        class="w-full px-4 py-3 rounded-xl border border-[#e8e1d7] bg-coffee-cream text-sm text-[#463e37] focus:outline-none focus:border-coffee-accent focus:ring-2 focus:ring-coffee-accent/25 transition-all duration-200">
                </div>

                <div>
                    <label
                        class="block text-xs font-bold uppercase tracking-wider text-coffee-dark mb-1.5">Guests</label>
                    <select name="guests"
                        class="w-full px-4 py-3 rounded-xl border border-[#e8e1d7] bg-coffee-cream text-sm text-[#463e37] focus:text-[#1f1a17] focus:outline-none focus:border-coffee-accent focus:ring-2 focus:ring-coffee-accent/25 transition-all duration-200 cursor-pointer">
                        <option value="1" class="text-[#1f1a17]">1 Person (Solo Work & Coffee)</option>
                        <option value="2" selected class="text-[#1f1a17]">2 People</option>
                        <option value="3-4" class="text-[#1f1a17]">3 - 4 People</option>
                        <option value="5+" class="text-[#1f1a17]">5+ People (Group)</option>
                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-coffee-accent hover:bg-coffee-hover text-white font-semibold text-[15px] py-3.5 rounded-full shadow-lg shadow-coffee-accent/30 transition-all duration-300 hover:-translate-y-0.5 cursor-pointer mt-2">
                    Confirm Reservation
                </button>
            </form>
        </div>

        <div class="modal-success hidden text-center py-4" id="modalSuccess">
            <div class="text-5xl mb-3">☕</div>
            <h4 class="font-serif text-2xl font-bold text-coffee-dark mb-2">Booking Received!</h4>
            <p class="text-sm text-[#463e37] mb-6">Your table reservation request has been received. (Portfolio Demo
                Preview)
            </p>
            <button
                class="w-full bg-coffee-dark hover:bg-coffee-accent text-white font-semibold text-[15px] py-3 rounded-full transition-colors duration-200 cursor-pointer"
                id="successOkBtn">
                Done
            </button>
        </div>

    </div>
</div>

<!-- Custom Script -->
<?php wp_footer(); ?>
</body>

</html>