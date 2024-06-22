$(document).ready(function() {
    // Default display: Antrian Loket
    $('.content').hide();
    $('#loket').show();

    // Handling navigation between Antrian Loket dan Antrian CS
    $('.navbar ul li a').on('click', function(e) {
        e.preventDefault();
        let target = $(this).attr('href').substring(1); // Get the target section id
        $('.content').hide(); // Hide all sections
        $('#' + target).show(); // Show the target section
    });

    // Generate buttons A1 to A30 for Antrian Loket
    for (let i = 1; i <= 30; i++) {
        let button = $('<button>').text('A' + i);
        button.addClass('queue-button');
        button.attr('id', 'A' + i);
        button.appendTo('.queue-buttons');
    }

    // Generate buttons B1 to B30 for Antrian CS
    for (let i = 1; i <= 30; i++) {
        let button = $('<button>').text('B' + i);
        button.addClass('queue-button-cs');
        button.attr('id', 'B' + i + '-cs');
        button.appendTo('.queue-buttons-cs');
    }

    // Handling button click event for Antrian Loket
    $('.queue-buttons').on('click', 'button.queue-button', function() {
        let queueNumber = $(this).text();
        if (!$(this).hasClass('used')) { // Check if button has not been used
            addQueue('loket', queueNumber);
            $(this).addClass('used');
        }
    });

    // Handling button click event for Antrian CS
    $('.queue-buttons-cs').on('click', 'button.queue-button-cs', function() {
        let queueNumber = $(this).text();
        if (!$(this).hasClass('used')) { // Check if button has not been used
            addQueue('cs', queueNumber);
            $(this).addClass('used');
        }
    });

    // Function to add queue to the table
    function addQueue(type, queueNumber) {
        let now = new Date();
        let time = now.toLocaleTimeString();
        let date = now.toLocaleDateString();

        let tableId = type === 'loket' ? '#queueTable' : '#queueTable-cs';
        let tbody = $(tableId + ' tbody');

        let row = $('<tr>');
        $('<td>').text(queueNumber).appendTo(row);
        $('<td>').text(type.toUpperCase()).appendTo(row);
        $('<td>').text(time).appendTo(row);
        $('<td>').append($('<button>').addClass('call').text('Panggil')).appendTo(row);

        row.appendTo(tbody);

        // Update datetime display
        let datetimeId = type === 'loket' ? '#datetime-loket' : '#datetime-cs';
        $(datetimeId).text(date + ' ' + time);
    }

    // Show popup when call button is clicked
    $('table').on('click', 'button.call', function() {
        let row = $(this).closest('tr');
        let queueNumber = row.find('td:first').text();
        let type = row.find('td:nth-child(2)').text();
        let time = row.find('td:nth-child(3)').text();

        $('#popupQueueNumber').text('Nomor Antrian: ' + queueNumber);
        $('#popupLoketCS').text(type + ': ' + queueNumber);
        $('#popupTimeCS').text('Waktu: ' + time);

        $('.popup').css('display', 'block');
    });

    // Close popup when close button or outside popup is clicked
    $('.close, .popup').on('click', function() {
        $('.popup').css('display', 'none');
    });

    // Handle pending button click for Antrian Loket
    $('#pending').on('click', function() {
        let row = $('table#queueTable tbody tr').first();
        if (row.length > 0) {
            let now = new Date();
            let time = now.toLocaleTimeString();
            row.find('td:nth-child(3)').text(time);
            updateDateTime('loket', now);
        }
        $('.popup').css('display', 'none');
    });

    // Handle delete button click for Antrian Loket
    $('#delete').on('click', function() {
        let row = $('table#queueTable tbody tr').first();
        if (row.length > 0) {
            let queueNumber = row.find('td:first').text();
            $('#' + queueNumber).removeClass('used'); // Enable the button
            row.remove();
        }
        $('.popup').css('display', 'none');
    });

    // Handle pending button click for Antrian CS
    $('#pending-cs').on('click', function() {
        let row = $('table#queueTable-cs tbody tr').first();
        if (row.length > 0) {
            let now = new Date();
            let time = now.toLocaleTimeString();
            row.find('td:nth-child(3)').text(time);
            updateDateTime('cs', now);
        }
        $('.popup').css('display', 'none');
    });

    // Handle delete button click for Antrian CS
    $('#delete-cs').on('click', function() {
        let row = $('table#queueTable-cs tbody tr').first();
        if (row.length > 0) {
            let queueNumber = row.find('td:first').text();
            $('#' + queueNumber + '-cs').removeClass('used'); // Enable the button
            row.remove();
        }
        $('.popup').css('display', 'none');
    });

    // Function to update date and time display
    function updateDateTime(type, dateTime) {
        let datetimeId = type === 'loket' ? '#datetime-loket' : '#datetime-cs';
        let date = dateTime.toLocaleDateString();
        let time = dateTime.toLocaleTimeString();
        $(datetimeId).text(date + ' ' + time);
    }

    // Function to update the current time every second
    function updateTime() {
        let now = new Date();
        let time = now.toLocaleTimeString();
        let date = now.toLocaleDateString();
        $('#datetime-cs').text(date + ' ' + time); // Update time for CS
        $('#datetime-loket').text(date + ' ' + time); // Update time for Loket
    }

    // Call updateTime every second
    setInterval(updateTime, 1000);

    // Initial call to display the time immediately on load
    updateTime();
});