<?php require 'views/layouts/header.php'; ?>

<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                <?= trans('How to Buy Tickets', 'Cara Pembelian Tiket') ?>
            </h1>
            <p class="mt-4 text-lg text-gray-500">
                <?= trans('Follow these simple steps to purchase your tickets.', 'Ikuti langkah-langkah mudah berikut untuk membeli tiket Anda.') ?>
            </p>
        </div>

        <div class="mt-12">
            <div class="flow-root">
                <ul role="list" class="-mb-8">
                    <!-- Step 1 -->
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                            <div class="relative flex space-x-3">
                                <div>
                                    <span class="h-8 w-8 rounded-full bg-teal-500 flex items-center justify-center ring-8 ring-white text-white font-bold">
                                        1
                                    </span>
                                </div>
                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900"><?= trans('Select Product', 'Pilih Produk') ?></h3>
                                        <p class="mt-1 text-gray-500"><?= trans('Browse through our Tours, Events, or Entrance Tickets. Click on the product you are interested in to view details.', 'Jelajahi Paket Tur, Acara, atau Tiket Masuk kami. Klik produk yang Anda minati untuk melihat detailnya.') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Step 2 -->
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                            <div class="relative flex space-x-3">
                                <div>
                                    <span class="h-8 w-8 rounded-full bg-teal-500 flex items-center justify-center ring-8 ring-white text-white font-bold">
                                        2
                                    </span>
                                </div>
                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900"><?= trans('Choose Date & Quantity', 'Pilih Tanggal & Jumlah') ?></h3>
                                        <p class="mt-1 text-gray-500"><?= trans('Select your preferred visit date and the number of tickets you wish to purchase.', 'Pilih tanggal kunjungan yang Anda inginkan dan jumlah tiket yang ingin Anda beli.') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Step 3 -->
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                            <div class="relative flex space-x-3">
                                <div>
                                    <span class="h-8 w-8 rounded-full bg-teal-500 flex items-center justify-center ring-8 ring-white text-white font-bold">
                                        3
                                    </span>
                                </div>
                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900"><?= trans('Add to Cart', 'Masukkan Keranjang') ?></h3>
                                        <p class="mt-1 text-gray-500"><?= trans('Click "Add to Cart" to proceed. You can continue shopping or go directly to checkout.', 'Klik "Masukkan Keranjang" untuk melanjutkan. Anda dapat lanjut berbelanja atau langsung menuju pembayaran.') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Step 4 -->
                    <li>
                        <div class="relative pb-8">
                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                            <div class="relative flex space-x-3">
                                <div>
                                    <span class="h-8 w-8 rounded-full bg-teal-500 flex items-center justify-center ring-8 ring-white text-white font-bold">
                                        4
                                    </span>
                                </div>
                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900"><?= trans('Checkout & Payment', 'Checkout & Pembayaran') ?></h3>
                                        <p class="mt-1 text-gray-500"><?= trans('Review your order and proceed to payment. We accept various payment methods including Bank Transfer and E-Wallets.', 'Tinjau pesanan Anda dan lanjutkan ke pembayaran. Kami menerima berbagai metode pembayaran termasuk Transfer Bank dan E-Wallet.') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Step 5 -->
                    <li>
                        <div class="relative pb-8">
                            <div class="relative flex space-x-3">
                                <div>
                                    <span class="h-8 w-8 rounded-full bg-teal-500 flex items-center justify-center ring-8 ring-white text-white font-bold">
                                        5
                                    </span>
                                </div>
                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900"><?= trans('Receive E-Ticket', 'Terima E-Ticket') ?></h3>
                                        <p class="mt-1 text-gray-500"><?= trans('After payment is confirmed, you will receive your E-Ticket with a QR Code via email or on your dashboard. Show this QR Code at the entrance.', 'Setelah pembayaran dikonfirmasi, Anda akan menerima E-Ticket dengan QR Code melalui email atau di dashboard Anda. Tunjukkan QR Code ini di pintu masuk.') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="mt-10 text-center">
            <a href="index.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700">
                <?= trans('Start Shopping', 'Mulai Belanja') ?>
            </a>
        </div>
    </div>
</div>

<?php require 'views/layouts/footer.php'; ?>
