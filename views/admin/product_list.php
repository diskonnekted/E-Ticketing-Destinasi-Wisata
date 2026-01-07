<?php require 'views/layouts/header.php'; ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Manage Tickets/Products</h1>
        <a href="index.php?page=admin_products&action=create" class="bg-teal-600 text-white px-4 py-2 rounded hover:bg-teal-700 shadow">
            <i class="fas fa-plus mr-2"></i> Add New Ticket
        </a>
    </div>

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name (EN/ID)</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?php if($product['image']): ?>
                            <img src="img/<?= $product['image'] ?>" class="h-12 w-12 rounded object-cover">
                        <?php else: ?>
                            <div class="h-12 w-12 rounded bg-gray-200"></div>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900"><?= $product['name_en'] ?></div>
                        <div class="text-sm text-gray-500"><?= $product['name_id'] ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <?= formatRupiah($product['price']) ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 uppercase">
                            <?= $product['type'] ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="index.php?page=admin_products&action=edit&id=<?= $product['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                        <a href="index.php?page=admin_products&action=delete&id=<?= $product['id'] ?>" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this ticket?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'views/layouts/footer.php'; ?>
