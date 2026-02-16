@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Products
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm float-end">
                        Back
                    </a>
                </h4>
            </div>

            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data" id="productForm">
                    @csrf

                    <!-- Hidden input to store active tab -->
                    <input type="hidden" name="active_tab" id="activeTab" value="{{ old('active_tab', 'home-tab') }}">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li> 
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Product Images <span class="text-danger">*</span>
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <!-- Home Tab -->
                        <div class="tab-pane fade border p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                            </div>

                            <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{ old('slug') }}" />
                            </div>

                            <div class="mb-3">
                                <label>Small Description (500 words)</label>
                                <textarea class="form-control" name="small_description" rows="4">{{ old('small_description') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <!-- SEO Tags Tab -->
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title') }}" />
                            </div>

                            <div class="mb-3">
                                <label>Meta Keyword</label>
                                <textarea class="form-control" name="meta_keyword" rows="4">{{ old('meta_keyword') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="4">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>

                        <!-- Details Tab -->
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text" class="form-control" name="original_price" value="{{ old('original_price') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" class="form-control" name="selling_price" value="{{ old('selling_price') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" style="width:30px; height:30px;" {{ old('trending') ? 'checked' : '' }} />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Featured</label>
                                        <input type="checkbox" name="featured" style="width:30px; height:30px;" {{ old('featured') ? 'checked' : '' }} />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" style="width:30px; height:30px;" {{ old('status') ? 'checked' : '' }} />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Images Tab -->
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="alert alert-info">
                                <strong><i class="fas fa-info-circle"></i> Important:</strong> You must upload at least 2 images - front view and back view of the product are required.
                            </div>
                            
                            <div class="mb-3">
                                <label>Upload Product Images <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="file" name="image[]" multiple class="form-control" id="productImages" accept="image/*">
                                    <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('productImages').click()">
                                        <i class="fas fa-folder-open"></i> Browse
                                    </button>
                                </div>
                                <small class="text-muted">Select at least 2 images (front and back). Hold Ctrl/Cmd to select multiple files.</small>
                                
                                @error('image')
                                <div class="text-danger mt-2">
                                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                                </div>
                                @enderror
                                
                                @error('image.*')
                                <div class="text-danger mt-2">
                                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label>Selected Images:</label>
                                    <span id="imageCountBadge" class="badge bg-secondary">0 images selected</span>
                                </div>
                                
                                <div class="progress mt-2" style="height: 10px;">
                                    <div id="imageProgressBar" class="progress-bar" role="progressbar" style="width: 0%"></div>
                                </div>
                            </div>

                            <div id="imagePreview" class="row mb-3">
                                <!-- Image previews will appear here -->
                            </div>
                            
                            <div id="imageRequirements" class="alert alert-warning d-none">
                                <i class="fas fa-exclamation-circle"></i> <span id="requirementMessage"></span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-save"></i> Submit Product
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            <i class="fas fa-redo"></i> Reset
                        </button>
                    </div>
                </form>

                <!-- Preview of uploaded images if there were errors -->
                @if(old('image_previews') && is_array(old('image_previews')))
                <div class="mt-4">
                    <h5>Previously Selected Images:</h5>
                    <div class="row">
                        @foreach(old('image_previews') as $index => $preview)
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <img src="data:image/jpeg;base64,{{ $preview }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                                <div class="card-body p-2">
                                    <p class="card-text small">Image {{ $index + 1 }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const productImages = document.getElementById('productImages');
    const imagePreview = document.getElementById('imagePreview');
    const imageCountBadge = document.getElementById('imageCountBadge');
    const imageProgressBar = document.getElementById('imageProgressBar');
    const imageRequirements = document.getElementById('imageRequirements');
    const requirementMessage = document.getElementById('requirementMessage');
    const submitBtn = document.getElementById('submitBtn');
    const form = document.getElementById('productForm');
    const activeTabInput = document.getElementById('activeTab');
    
    // Get all tab elements
    const homeTab = document.getElementById('home-tab');
    const seoTab = document.getElementById('seotag-tab');
    const detailsTab = document.getElementById('details-tab');
    const imagesTab = document.getElementById('image-tab');
    const tabButtons = [homeTab, seoTab, detailsTab, imagesTab];

    // Store all selected files
    let allSelectedFiles = [];
    let uploadedImages = [];

    // Function to save current tab
    function saveActiveTab(tabId) {
        activeTabInput.value = tabId;
        sessionStorage.setItem('activeProductTab', tabId);
    }

    // Function to activate tab based on stored value
    function activateStoredTab() {
        const storedTab = sessionStorage.getItem('activeProductTab') || 'home-tab';
        const tabToActivate = document.getElementById(storedTab);
        
        if (tabToActivate) {
            const tab = new bootstrap.Tab(tabToActivate);
            tab.show();
            activeTabInput.value = storedTab;
        }
    }

    // Add click handlers to all tabs
    tabButtons.forEach(tabButton => {
        tabButton.addEventListener('click', function() {
            saveActiveTab(this.id);
        });
    });

    // Check for image validation errors and switch to images tab if needed
    @if($errors->has('image') || $errors->has('image.*'))
        const imagesTabBtn = document.getElementById('image-tab');
        if (imagesTabBtn) {
            const tab = new bootstrap.Tab(imagesTabBtn);
            tab.show();
            activeTabInput.value = 'image-tab';
            sessionStorage.setItem('activeProductTab', 'image-tab');
        }
    @endif

    // Function to update the file input with all selected files
    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        
        allSelectedFiles.forEach(file => {
            dataTransfer.items.add(file);
        });
        
        productImages.files = dataTransfer.files;
    }

    // Function to update image count and progress
    function updateImageCount() {
        const count = allSelectedFiles.length;
        
        // Update badge
        imageCountBadge.textContent = `${count} image${count !== 1 ? 's' : ''} selected`;
        
        // Update progress bar
        const progressPercentage = Math.min((count / 2) * 100, 100);
        imageProgressBar.style.width = `${progressPercentage}%`;
        
        // Update badge color and progress bar color
        if (count < 2) {
            imageCountBadge.className = 'badge bg-danger';
            imageProgressBar.className = 'progress-bar bg-danger';
            imageRequirements.classList.remove('d-none');
            requirementMessage.textContent = `Please select ${2 - count} more image${2 - count !== 1 ? 's' : ''} (minimum 2 required)`;
            submitBtn.disabled = true;
        } else {
            imageCountBadge.className = 'badge bg-success';
            imageProgressBar.className = 'progress-bar bg-success';
            imageRequirements.classList.add('d-none');
            submitBtn.disabled = false;
        }
    }

    // Function to remove a specific image
    function removeImage(index) {
        allSelectedFiles.splice(index, 1);
        uploadedImages.splice(index, 1);
        
        // Refresh the preview
        refreshImagePreview();
        
        // Update file input
        updateFileInput();
        
        // Update count
        updateImageCount();
        
        // Store in sessionStorage
        sessionStorage.setItem('imageCount', allSelectedFiles.length);
    }

    // Function to refresh all image previews
    async function refreshImagePreview() {
        imagePreview.innerHTML = '';
        
        for (let i = 0; i < allSelectedFiles.length; i++) {
            const preview = await createImagePreview(allSelectedFiles[i], i);
            if (preview) {
                imagePreview.appendChild(preview);
            }
        }
    }

    // Function to convert file to base64
    function fileToBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result.split(',')[1]);
            reader.onerror = error => reject(error);
        });
    }

    // Function to create image preview with remove button
    function createImagePreview(file, index) {
        return new Promise((resolve) => {
            if (file.type.match('image.*')) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-md-3 mb-3';
                    col.dataset.index = index;
                    
                    const card = document.createElement('div');
                    card.className = 'card h-100';
                    
                    const imgContainer = document.createElement('div');
                    imgContainer.className = 'position-relative';
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'card-img-top';
                    img.style.height = '150px';
                    img.style.objectFit = 'cover';
                    
                    const badge = document.createElement('span');
                    badge.className = 'position-absolute top-0 start-0 badge bg-primary';
                    badge.textContent = `#${index + 1}`;
                    badge.style.fontSize = '0.8em';
                    
                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0 m-1';
                    removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                    removeBtn.style.zIndex = '10';
                    removeBtn.onclick = function(e) {
                        e.preventDefault();
                        removeImage(index);
                    };
                    
                    imgContainer.appendChild(img);
                    imgContainer.appendChild(badge);
                    imgContainer.appendChild(removeBtn);
                    
                    const cardBody = document.createElement('div');
                    cardBody.className = 'card-body p-2';
                    
                    const fileName = document.createElement('p');
                    fileName.className = 'card-text small text-truncate mb-0';
                    fileName.textContent = file.name.length > 20 ? 
                        file.name.substring(0, 20) + '...' : file.name;
                    
                    const fileSize = document.createElement('p');
                    fileSize.className = 'card-text small text-muted';
                    const sizeInKB = Math.round(file.size / 1024);
                    fileSize.textContent = `${sizeInKB} KB`;
                    
                    cardBody.appendChild(fileName);
                    cardBody.appendChild(fileSize);
                    card.appendChild(imgContainer);
                    card.appendChild(cardBody);
                    col.appendChild(card);
                    
                    resolve(col);
                };
                
                reader.readAsDataURL(file);
            } else {
                resolve(null);
            }
        });
    }

    // Handle new image selection (APPEND instead of REPLACE)
    productImages.addEventListener('change', async function() {
        const newFiles = Array.from(this.files);
        
        // Add new files to the cumulative list
        allSelectedFiles = [...allSelectedFiles, ...newFiles];
        
        // Clear the file input to allow re-selecting the same files
        this.value = '';
        
        // Update file input with all files
        updateFileInput();
        
        // Update count and progress
        updateImageCount();
        
        // Create previews for all files (refresh all)
        await refreshImagePreview();
        
        // Store base64 for persistence
        uploadedImages = [];
        for (let i = 0; i < allSelectedFiles.length; i++) {
            const base64 = await fileToBase64(allSelectedFiles[i]);
            uploadedImages.push(base64);
        }
        
        // Store in sessionStorage for persistence
        sessionStorage.setItem('uploadedImages', JSON.stringify(uploadedImages));
        sessionStorage.setItem('imageCount', allSelectedFiles.length);
        
        // Make sure we stay on images tab
        const tab = new bootstrap.Tab(imagesTab);
        tab.show();
        saveActiveTab('image-tab');
    });

    // Form validation before submit
    form.addEventListener('submit', function(e) {
        if (allSelectedFiles.length < 2) {
            e.preventDefault();
            
            // Switch to images tab
            const tab = new bootstrap.Tab(imagesTab);
            tab.show();
            saveActiveTab('image-tab');
            
            // Show alert
            Swal.fire({
                icon: 'error',
                title: 'Images Required',
                html: `Please upload at least 2 images (front and back views).<br><br>
                       <strong>Currently selected:</strong> ${allSelectedFiles.length} image${allSelectedFiles.length !== 1 ? 's' : ''}`,
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
            });
        } else {
            // Store active tab before submit
            saveActiveTab(activeTabInput.value);
            
            // Store image data in session for persistence after validation error
            if (uploadedImages.length > 0) {
                sessionStorage.setItem('uploadedImages', JSON.stringify(uploadedImages));
            }
        }
    });

    // Clear previews and session when form is reset
    form.addEventListener('reset', function() {
        allSelectedFiles = [];
        uploadedImages = [];
        imagePreview.innerHTML = '';
        imageCountBadge.textContent = '0 images selected';
        imageCountBadge.className = 'badge bg-secondary';
        imageProgressBar.style.width = '0%';
        imageProgressBar.className = 'progress-bar';
        imageRequirements.classList.add('d-none');
        submitBtn.disabled = true; // Disable submit because minimum images not met
        
        // Clear file input
        productImages.value = '';
        updateFileInput();
        
        // Clear session storage
        sessionStorage.removeItem('uploadedImages');
        sessionStorage.removeItem('imageCount');
        sessionStorage.removeItem('activeProductTab');
        
        // Reset to home tab
        const tab = new bootstrap.Tab(homeTab);
        tab.show();
        saveActiveTab('home-tab');
    });

    // Restore previously selected images if any (from session storage)
    const storedImageCount = sessionStorage.getItem('imageCount');
    if (storedImageCount && parseInt(storedImageCount) > 0) {
        // Update UI to show count
        imageCountBadge.textContent = `${storedImageCount} images selected`;
        imageCountBadge.className = 'badge bg-success';
        imageProgressBar.style.width = '100%';
        imageProgressBar.className = 'progress-bar bg-success';
        submitBtn.disabled = false;
    }

    // Activate the last active tab on page load
    activateStoredTab();

    // Handle browser back/forward navigation
    window.addEventListener('popstate', function() {
        activateStoredTab();
    });
});
</script>

@if(!isset($swal))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endif

<style>
    .progress-bar {
        transition: width 0.3s ease;
    }
    
    .card {
        transition: transform 0.2s;
    }
    
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    #imagePreview img {
        cursor: pointer;
    }
    
    .nav-link.active {
        font-weight: 600;
        background-color: #f8f9fa !important;
        border-bottom-color: transparent !important;
    }
    
    /* Tab transition smoothness */
    .tab-pane {
        transition: opacity 0.15s linear;
    }
</style>

@endsection