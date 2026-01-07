<?php require 'views/layouts/header.php'; ?>

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-6">
        <a href="index.php?page=admin_products" class="text-teal-600 hover:text-teal-800 font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Back to List
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">
            <?= isset($product) ? 'Edit Ticket' : 'Add New Ticket' ?>
        </h1>

        <form action="index.php?page=admin_products&action=<?= isset($product) ? 'update&id='.$product['id'] : 'store' ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            
            <!-- Names -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name (English)</label>
                    <input type="text" name="name_en" required value="<?= $product['name_en'] ?? '' ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Name (Indonesian)</label>
                    <input type="text" name="name_id" required value="<?= $product['name_id'] ?? '' ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2">
                </div>
            </div>

            <!-- Descriptions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description (English)</label>
                    <textarea name="description_en" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2"><?= $product['description_en'] ?? '' ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description (Indonesian)</label>
                    <textarea name="description_id" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2"><?= $product['description_id'] ?? '' ?></textarea>
                </div>
            </div>

            <!-- Additional Info -->
             <div>
                <label class="block text-sm font-medium text-gray-700">Duration (e.g., "4 Days 3 Nights")</label>
                <input type="text" name="duration" value="<?= $product['duration'] ?? '' ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2">
            </div>

            <!-- Itinerary -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Itinerary (English)</label>
                    <textarea name="itinerary_en" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2" placeholder="Day 1: Arrival..."><?= $product['itinerary_en'] ?? '' ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Itinerary (Indonesian)</label>
                    <textarea name="itinerary_id" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2" placeholder="Hari 1: Kedatangan..."><?= $product['itinerary_id'] ?? '' ?></textarea>
                </div>
            </div>

            <!-- Facilities -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Facilities Included/Excluded (English)</label>
                    <textarea name="facilities_en" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2" placeholder="Included: Hotel, Transport..."><?= $product['facilities_en'] ?? '' ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Facilities Included/Excluded (Indonesian)</label>
                    <textarea name="facilities_id" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2" placeholder="Termasuk: Hotel, Transportasi..."><?= $product['facilities_id'] ?? '' ?></textarea>
                </div>
            </div>

             <!-- Policy -->
             <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Policies (English)</label>
                    <textarea name="policy_en" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2" placeholder="Cancellation policy..."><?= $product['policy_en'] ?? '' ?></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Policies (Indonesian)</label>
                    <textarea name="policy_id" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2" placeholder="Kebijakan pembatalan..."><?= $product['policy_id'] ?? '' ?></textarea>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Price (IDR)</label>
                    <input type="number" name="price" required value="<?= $product['price'] ?? '' ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Type</label>
                    <select name="type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2">
                        <option value="tour" <?= (isset($product) && $product['type'] == 'tour') ? 'selected' : '' ?>>Tour</option>
                        <option value="entrance" <?= (isset($product) && $product['type'] == 'entrance') ? 'selected' : '' ?>>Entrance Ticket</option>
                        <option value="event" <?= (isset($product) && $product['type'] == 'event') ? 'selected' : '' ?>>Event</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Image</label>
                <?php if(isset($product) && $product['image']): ?>
                    <div class="mt-2 mb-2">
                        <img src="img/<?= $product['image'] ?>" class="h-32 w-auto rounded">
                    </div>
                <?php endif; ?>
                <input type="file" name="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
                <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image (if editing).</p>
            </div>

            <!-- Location -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-200">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Latitude</label>
                    <input type="text" name="latitude" value="<?= $product['latitude'] ?? '' ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2" placeholder="-7.205">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Longitude</label>
                    <input type="text" name="longitude" value="<?= $product['longitude'] ?? '' ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500 sm:text-sm border p-2" placeholder="109.914">
                </div>
            </div>

            <!-- Gallery -->
             <div class="pt-4 border-t border-gray-200">
                <label class="block text-sm font-medium text-gray-700">Gallery Images (Multiple)</label>
                 <?php if(isset($gallery) && !empty($gallery)): ?>
                    <div class="flex space-x-2 mt-2 mb-2 overflow-x-auto">
                        <?php foreach($gallery as $img): ?>
                        <div class="relative">
                            <img src="img/<?= $img['image_path'] ?>" class="h-16 w-16 object-cover rounded border border-gray-300">
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <input type="file" name="gallery[]" multiple accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
                <p class="text-xs text-gray-500 mt-1">Hold Ctrl/Cmd to select multiple files.</p>
            </div>

            <div class="pt-4 border-t border-gray-200">
                <button type="submit" class="w-full bg-teal-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                    <?= isset($product) ? 'Update Ticket' : 'Create Ticket' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<?php require 'views/layouts/footer.php'; ?>
