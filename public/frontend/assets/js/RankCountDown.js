const countdown = () => {
    const targetDate = new Date("2024-11-26T23:59:59").getTime();
    const interval = setInterval(() => {
      const now = new Date().getTime();
      const distance = targetDate - now;

      if (distance < 0) {
        clearInterval(interval);
        document.querySelector('.rank--countdown').innerHTML = "Time's up!";
        return;
      }

      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      document.querySelectorAll('.rank--count')[0].innerText = days;
      document.querySelectorAll('.rank--count')[1].innerText = hours;
      document.querySelectorAll('.rank--count')[2].innerText = minutes;
      document.querySelectorAll('.rank--count')[3].innerText = seconds;
    }, 1000);
  };

  countdown();
