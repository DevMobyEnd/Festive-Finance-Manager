document.addEventListener('DOMContentLoaded', () => {
    const snowflakes = 50;
    const container = document.body;

    for (let i = 0; i < snowflakes; i++) {
        const snowflake = document.createElement('div');
        snowflake.className = 'snowflake';
        snowflake.textContent = '❄️';

        snowflake.style.left = `${Math.random() * 100}vw`;
        snowflake.style.animationDuration = `${Math.random() * 3 + 2}s`;
        snowflake.style.fontSize = `${Math.random() * 10 + 10}px`;

        container.appendChild(snowflake);
    }
});
