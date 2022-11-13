/**
 * This file is responsible for updating the navbar clock.
 */

// ensure the document is ready
const formatTime = date => date
    .toLocaleTimeString()
    .split(':')
    .slice(0, 2)
    .join(':');

function createClock() {
    const CURRENT_TIME_EL = document.getElementById('currentTime');
    const DATE = new Date();

    // Create our elements

    // currentDate
    const dateEl = document.createElement('p');
    dateEl.classList.add('text-light', 'm-0', 'p-2');
    dateEl.innerText = DATE.toLocaleDateString();

    // currentTime
    const timeEl = document.createElement('p');
    timeEl.classList.add('text-light', 'align-self-center', 'm-2', 'p-0');
    timeEl.innerText = formatTime(DATE);

    // AM/PM
    const timeOfDay = DATE.getHours() > 12 ? 'PM' : 'AM';
    const timeOfDayEl = document.createElement('p');
    timeOfDayEl.innerText = timeOfDay;
    timeOfDayEl.classList.add('text-light', 'align-self-center', 'm-0', 'p-0');

    // APPEND TO DOM

    // append the date
    CURRENT_TIME_EL.appendChild(dateEl);
    // append the time
    CURRENT_TIME_EL.appendChild(timeEl);
    // append the time of day
    CURRENT_TIME_EL.appendChild(timeOfDayEl);


    // update the time 15 seconds after the page loads
    setInterval(() => {
        const date = new Date();
        timeEl.innerText = formatTime(date);
    }, 15000);
}



function main() {
    // Load the clock if the DOM is in a ready state
    if (document.readyState === 'complete') {
        createClock();
    } else {
        // otherwise, wait for the DOM to load
        document.addEventListener('DOMContentLoaded', createClock);
    }
}

main();
