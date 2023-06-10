jQuery(document).ready(function($) {
    var typingElements = $('.mytype'); // Get all elements with class '.mytype'
    var typingIntervals = []; // Array to store typing intervals
    var isTypingStarted = false; // Flag to check if typing animation has started

    $(window).scroll(function() {
        if (!isTypingStarted) {
            startTypewriterAnimation();
            isTypingStarted = true;
        }
    });

    function startTypewriterAnimation() {
        typingElements.each(function() {
            var $this = $(this);
            var text = $this.text();
            $this.empty();

            var speed = parseInt($this.data('speed')) || 100; // Typing speed in milliseconds

            // Initialize the typewriter animation
            var i = 0;
            var interval = setInterval(function() {
                if (i < text.length) {
                    $this.append(text.charAt(i));
                    i++;
                } else {
                    clearInterval(interval);
                    i = 0; // Reset index for repeating animation
                    startRepeatingAnimation($this, text, speed);
                }
            }, speed);

            typingIntervals.push(interval);
        });
    }

    function startRepeatingAnimation(element, text, speed) {
        var interval = setInterval(function() {
            if (element.text() === text) {
                element.empty();
                element.text(text.charAt(0));
            } else {
                element.append(text.charAt(element.text().length));
            }
        }, speed);

        typingIntervals.push(interval);
    }

    function stopTypewriterAnimation() {
        for (var i = 0; i < typingIntervals.length; i++) {
            clearInterval(typingIntervals[i]);
        }
        typingIntervals = [];
        typingElements.empty();
    }
});
