
    const tickets = document.querySelectorAll('.ticket');
    tickets.forEach(ticket => {
            ticket.addEventListener('click', function() {
            const idTicket = this.dataset.idTicket;
            updateTicketStatus(idTicket);
        });
    });


    function updateTicketStatus(ticketId) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/../a/update_ticket_status.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send('idTicket=' + idTicket);
    }




