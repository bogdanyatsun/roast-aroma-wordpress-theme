document.addEventListener('DOMContentLoaded', () => {


  // ==========================================
  // 2. МОДАЛКА БРОНИРОВАНИЯ СТОЛИКОВ
  // ==========================================
  const bookingModal = document.getElementById('bookingModal');
  const openBookingBtns = document.querySelectorAll('.open-booking-btn');
  const closeBookingBtn = document.getElementById('closeModalBtn');
  const bookingForm = document.getElementById('reservationForm');
  const formContainer = document.getElementById('modalFormContainer');
  const successNotice = document.getElementById('modalSuccess');
  const successOkBtn = document.getElementById('successOkBtn');
  const dateInput = document.getElementById('bookingDateTime');

  // ==========================================
  // 3. TOAST-УВЕДОМЛЕНИЯ
  // ==========================================
  const showToast = (title, subtitle) => {
    let toastContainer = document.getElementById('toastContainer');
    if (!toastContainer) {
      toastContainer = document.createElement('div');
      toastContainer.id = 'toastContainer';
      toastContainer.className = 'fixed bottom-6 right-6 z-50 flex flex-col gap-3 pointer-events-none';
      document.body.appendChild(toastContainer);
    }

    const toast = document.createElement('div');
    toast.className = 'flex items-center gap-3 bg-[#1f1a17] text-white px-5 py-3.5 rounded-2xl shadow-2xl border border-white/10 text-sm font-medium transform translate-y-6 opacity-0 transition-all duration-300 pointer-events-auto max-w-sm';

    // Создаём структуру с безопасным textContent
    toast.innerHTML = `
      <div class="w-7 h-7 rounded-full bg-coffee-accent/20 text-coffee-accent flex items-center justify-center shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
      </div>
      <div class="leading-tight">
        <p class="font-bold text-white toast-title"></p>
        <p class="text-xs text-[#9ca3af] toast-subtitle"></p>
      </div>
    `;

    // Безопасно вставляем текст, исключая XSS
    toast.querySelector('.toast-title').textContent = title;
    toast.querySelector('.toast-subtitle').textContent = subtitle;

    toastContainer.appendChild(toast);

    requestAnimationFrame(() => {
      toast.classList.remove('translate-y-6', 'opacity-0');
      toast.classList.add('translate-y-0', 'opacity-100');
    });

    setTimeout(() => {
      toast.classList.remove('translate-y-0', 'opacity-100');
      toast.classList.add('translate-y-6', 'opacity-0');
      setTimeout(() => toast.remove(), 300);
    }, 3200);
  };



  // ==========================================
  // 5. ЛОГИКА БРОНИРОВАНИЯ СТОЛИКОВ
  // ==========================================
  const setMinDateTime = () => {
    const now = new Date();
    const localISO = new Date(now.getTime() - now.getTimezoneOffset() * 60000)
      .toISOString()
      .slice(0, 16);
    dateInput.min = localISO;
  };

  const validateWorkingHours = () => {
    if (!dateInput.value) return;

    const selectedDate = new Date(dateInput.value);
    const day = selectedDate.getDay();
    const timeInMinutes = selectedDate.getHours() * 60 + selectedDate.getMinutes();

    let openMinutes = 0;
    let closeMinutes = 0;
    let scheduleNotice = '';

    if (day === 0) {
      openMinutes = 9 * 60;
      closeMinutes = 17 * 60;
      scheduleNotice = 'Sunday (09:00 – 17:00)';
    } else if (day === 6) {
      openMinutes = 8 * 60 + 30;
      closeMinutes = 19 * 60;
      scheduleNotice = 'Saturday (08:30 – 19:00)';
    } else {
      openMinutes = 7 * 60 + 30;
      closeMinutes = 18 * 60;
      scheduleNotice = 'Mon – Fri (07:30 – 18:00)';
    }

    if (timeInMinutes < openMinutes || timeInMinutes > closeMinutes) {
      dateInput.setCustomValidity(`We're closed at this time. Our hours for this day: ${scheduleNotice}.`);
    } else {
      dateInput.setCustomValidity('');
    }
  };

  const openBooking = () => {
    formContainer.style.display = 'block';
    successNotice.style.display = 'none';
    bookingModal.style.display = 'flex';
    setMinDateTime();
  };

  const closeBooking = () => {
    bookingModal.style.display = 'none';
    bookingForm.reset();
    dateInput.setCustomValidity('');
  };

  openBookingBtns.forEach(btn => btn.addEventListener('click', openBooking));
  closeBookingBtn.addEventListener('click', closeBooking);
  successOkBtn.addEventListener('click', closeBooking);

  dateInput.addEventListener('input', validateWorkingHours);
  dateInput.addEventListener('change', validateWorkingHours);

  bookingForm.addEventListener('submit', (e) => {
    e.preventDefault();
    validateWorkingHours();

    if (!bookingForm.checkValidity()) {
      bookingForm.reportValidity();
      return;
    }

    formContainer.style.display = 'none';
    successNotice.style.display = 'block';
    bookingForm.reset();
  });

  // ==========================================
  // 6. ТАБЫ ФИЛЬТРАЦИИ МЕНЮ
  // ==========================================
  const filterBtns = document.querySelectorAll('.menu-filter-btn');
  const menuCards = document.querySelectorAll('[data-category]');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const selectedFilter = btn.dataset.filter;

      filterBtns.forEach(b => {
        b.classList.remove('bg-coffee-dark', 'text-white', 'shadow-sm');
        b.classList.add('bg-coffee-cream', 'border', 'border-[#e8e1d7]', 'text-[#6b635b]');
      });

      btn.classList.add('bg-coffee-dark', 'text-white', 'shadow-sm');
      btn.classList.remove('bg-coffee-cream', 'border', 'border-[#e8e1d7]', 'text-[#6b635b]');

      menuCards.forEach(card => {
        const category = card.dataset.category;
        if (selectedFilter === 'all' || category === selectedFilter) {
          card.classList.remove('hidden');
        } else {
          card.classList.add('hidden');
        }
      });
    });
  });
});