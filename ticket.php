<!DOCTYPE html>
<html>
<head>
    <style>
        .ticket {
            border: 2px solid #000;
            padding: 10px;
            width: 300px;
        }

        .ticket-info {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <div class="ticket-info">
            <span class="label">Ticket No:</span> <?php echo $ticketNo; ?>
        </div>
        <div class="ticket-info">
            <span class="label">Reservation ID:</span> <?php echo $reservationId; ?>
        </div>
        <div class="ticket-info">
            <span class="label">Date:</span> <?php echo $date; ?>
        </div>
        <div class="ticket-info">
            <span class="label">Time:</span> <?php echo $time; ?>
        </div>
        <div class="ticket-info">
            <span class="label">Amount:</span> <?php echo $amount; ?>
        </div>
        <div class="ticket-info">
            <span class="label">Payment Method:</span> <?php echo $paymentMethod; ?>
        </div>
    </div>
</body>
</html>