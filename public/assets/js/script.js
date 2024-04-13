function updateServerTime() {
    const timeElement = document.getElementById('server-time');
    const timeParts = timeElement.textContent.split(':');
    let currentTime = new Date();
    currentTime.setHours(parseInt(timeParts[0], 10));
    currentTime.setMinutes(parseInt(timeParts[1], 10));
    currentTime.setSeconds(parseInt(timeParts[2], 10) + 1);

    const formattedTime = currentTime.toLocaleTimeString('pl-PL', {
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit'
    });

    timeElement.textContent = formattedTime;
}

setInterval(updateServerTime, 1000);

if (document.getElementById('action-countdown')) {
    const display = document.getElementById('action-countdown');
    let [hours, minutes, seconds] = display.textContent.split(':').map(Number);

    function countdown() {
        if (seconds === 0) {
            if (minutes === 0) {
                if (hours === 0) {
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000)
                    return;
                } else {
                    hours--;
                    minutes = 59;
                }
            } else {
                minutes--;
            }
            seconds = 59;
        } else {
            seconds--;
        }

        let hoursStr = hours.toString().padStart(2, '0');
        let minutesStr = minutes.toString().padStart(2, '0');
        let secondsStr = seconds.toString().padStart(2, '0');

        display.textContent = `${hoursStr}:${minutesStr}:${secondsStr}`;

        setTimeout(countdown, 1000);
    }

    countdown();
}
