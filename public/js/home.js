        // Get the scrollable div element
        var scrollableDiv = document.
            getElementById('scrollableDiv');
 
        // Function to scroll to the bottom 
        //of the div using scrollIntoView method
        function scrollToBottom() {
            var bottomElement = scrollableDiv.
                lastElementChild;
            bottomElement
                .scrollIntoView({ behavior: 'smooth', block: 'end' });
        }