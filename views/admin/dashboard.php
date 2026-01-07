<?php require 'views/layouts/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Admin Dashboard</h1>
    
    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-teal-500">
            <h3 class="text-gray-500 text-sm font-medium">Total Orders</h3>
            <p class="text-3xl font-bold text-gray-900"><?= $pdo->query("SELECT count(*) FROM orders")->fetchColumn() ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-orange-500">
            <h3 class="text-gray-500 text-sm font-medium">Tickets Sold</h3>
            <p class="text-3xl font-bold text-gray-900"><?= $pdo->query("SELECT count(*) FROM tickets")->fetchColumn() ?></p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
            <h3 class="text-gray-500 text-sm font-medium">Revenue</h3>
            <p class="text-3xl font-bold text-gray-900"><?= formatRupiah($pdo->query("SELECT sum(total_amount) FROM orders WHERE status='paid'")->fetchColumn() ?? 0) ?></p>
        </div>
    </div>

    <div class="flex space-x-4 mb-8">
        <a href="index.php?page=operator" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            <i class="fas fa-qrcode mr-2"></i> Open POS Scanner
        </a>
        <a href="index.php?page=admin_products" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700">
            <i class="fas fa-ticket-alt mr-2"></i> Manage Products/Tickets
        </a>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Recent Orders</h3>
        </div>
        <div class="border-t border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                    $orders = $pdo->query("SELECT o.*, u.username FROM orders o JOIN users u ON o.user_id = u.id ORDER BY created_at DESC LIMIT 10")->fetchAll();
                    foreach ($orders as $order):
                    ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#<?= $order['id'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $order['username'] ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= formatRupiah($order['total_amount']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                <?= $order['status'] ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?= $order['created_at'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'views/layouts/footer.php'; ?>
