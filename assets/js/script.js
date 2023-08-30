$(document).ready(function() {
    // Function to convert timestamp to relative time
    function timeSince(date) {
        const seconds = Math.floor((new Date() - new Date(date)) / 1000);
        const intervals = {
            year: 31536000,
            month: 2592000,
            week: 604800,
            day: 86400,
            hour: 3600,
            minute: 60,
            second: 1
        };

        for (let unit in intervals) {
            if (intervals.hasOwnProperty(unit)) {
                const interval = Math.floor(seconds / intervals[unit]);
                if (interval > 1) {
                    return interval + " " + unit + "s ago";
                } else if (interval === 1) {
                    return interval + " " + unit + " ago";
                }
            }
        }
        return "just now";
    }

    // Update timestamps with relative time
    $(".timestamp").each(function() {
        const creationDate = $(this).data("creation");
        const relativeTime = timeSince(creationDate);
        $(this).text(relativeTime);
    });
});