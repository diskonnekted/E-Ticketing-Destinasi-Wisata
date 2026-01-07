<?php require 'views/layouts/header.php'; ?>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="md:flex md:space-x-8">
        <div class="md:w-1/2">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-4">POS Scanner</h1>
            <div id="reader" width="600px" class="bg-gray-100 rounded-lg overflow-hidden"></div>
            <p class="mt-4 text-sm text-gray-500">Point camera at QR Code to scan.</p>
        </div>
        
        <div class="md:w-1/2 mt-8 md:mt-0">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Scan Result</h2>
            <div id="result-card" class="bg-white shadow rounded-lg p-6 hidden">
                <div id="status-icon" class="text-center mb-4 text-6xl"></div>
                <h3 id="status-text" class="text-center text-xl font-bold mb-2"></h3>
                <p id="ticket-info" class="text-center text-gray-600"></p>
                <div class="mt-6 border-t pt-4">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Ticket Type</dt>
                            <dd class="mt-1 text-sm text-gray-900" id="ticket-type"></dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Visit Date</dt>
                            <dd class="mt-1 text-sm text-gray-900" id="ticket-date"></dd>
                        </div>
                    </dl>
                </div>
            </div>
            
            <div id="instruction" class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg p-12 text-center text-gray-500">
                Waiting for scan...
            </div>
        </div>
    </div>
</div>

<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        console.log(`Scan result: ${decodedText}`, decodedResult);
        
        // Stop scanning temporarily to process
        // html5QrcodeScanner.clear(); // Optional: stop scanning
        
        fetch('index.php?page=api_ticket_scan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ code: decodedText }),
        })
        .then(response => response.json())
        .then(data => {
            const card = document.getElementById('result-card');
            const instruction = document.getElementById('instruction');
            const icon = document.getElementById('status-icon');
            const text = document.getElementById('status-text');
            const info = document.getElementById('ticket-info');
            
            instruction.classList.add('hidden');
            card.classList.remove('hidden');
            
            if (data.success) {
                icon.innerHTML = '<i class="fas fa-check-circle text-green-500"></i>';
                text.innerHTML = 'Access Granted';
                text.className = 'text-center text-xl font-bold mb-2 text-green-600';
                info.innerText = `Ticket Code: ${decodedText}`;
                document.getElementById('ticket-type').innerText = data.ticket.name_en;
                document.getElementById('ticket-date').innerText = data.ticket.visit_date;
                
                // Play success sound
                // new Audio('assets/success.mp3').play();
            } else {
                icon.innerHTML = '<i class="fas fa-times-circle text-red-500"></i>';
                text.innerHTML = data.message;
                text.className = 'text-center text-xl font-bold mb-2 text-red-600';
                info.innerText = `Code: ${decodedText}`;
                document.getElementById('ticket-type').innerText = data.ticket ? data.ticket.name_en : '-';
                document.getElementById('ticket-date').innerText = data.ticket ? data.ticket.visit_date : '-';
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
</script>

<?php require 'views/layouts/footer.php'; ?>
