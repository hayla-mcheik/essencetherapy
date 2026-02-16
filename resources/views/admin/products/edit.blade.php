@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        @if(session('message'))
        <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h4>Edit Products
                    <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm float-end">Back</a>
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

                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data" id="productForm">
                    @csrf
                    @method('PUT')
                    
                    <!-- Hidden input to store active tab -->
                    <input type="hidden" name="active_tab" id="activeTab" value="{{ old('active_tab', session('active_tab', 'home-tab')) }}">

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
                                Product Images
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
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }} >
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" class="form-control" value="{{ $product->name }}" name="name" />
                            </div>

                            <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" class="form-control" value="{{ $product->slug }}" name="slug" />
                            </div>

                            <div class="mb-3">
                                <label>Small Description (500 words)</label>
                                <textarea class="form-control" name="small_description" rows="4">{{ $product->small_description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <!-- SEO Tags Tab -->
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Meta Title</label>
                                <input type="text" class="form-control" name="meta_title" value="{{ $product->meta_title }}" />
                            </div>

                            <div class="mb-3">
                                <label>Meta Keyword</label>
                                <textarea class="form-control" name="meta_keyword" rows="4">{{ $product->meta_keyword }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Meta Description</label>
                                <textarea class="form-control" name="meta_description" rows="4">{{ $product->meta_description }}</textarea>
                            </div>
                        </div>

                        <!-- Details Tab -->
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Original Price</label>
                                        <input type="text" class="form-control" value="{{ $product->original_price }}" name="original_price" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Selling Price</label>
                                        <input type="text" class="form-control" value="{{ $product->selling_price }}" name="selling_price" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="number" class="form-control" value="{{ $product->quantity }}" name="quantity" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" {{ $product->trending == '1' ? 'checked':'' }} style="width:30px; height:30px;" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Featured</label>
                                        <input type="checkbox" name="featured" {{ $product->featured == '1' ? 'checked':'' }} style="width:30px; height:30px;" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" {{ $product->status == '1' ? 'checked':'' }} style="width:30px; height:30px;" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Images Tab -->
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="alert alert-info">
                                <strong><i class="fas fa-info-circle"></i> Note:</strong> You can upload additional images. Existing images are shown below.
                            </div>
                            
                            <div class="mb-3">
                                <label>Upload New Images</label>
                                <div class="input-group">
                                    <input type="file" name="image[]" multiple class="form-control" id="productImages" accept="image/*">
                                    <button type="button" class="btn btn-outline-primary" onclick="document.getElementById('productImages').click()">
                                        <i class="fas fa-folder-open"></i> Browse
                                    </button>
                                </div>
                                <small class="text-muted">You can select multiple images at once or add more later.</small>
                                
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

                            <!-- New Images Counter -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label>New Images Selected:</label>
                                    <span id="newImageCountBadge" class="badge bg-secondary">0 new images</span>
                                </div>
                            </div>

                            <!-- Preview of newly selected images -->
                            <div id="newImagePreview" class="row mb-4">
                                <!-- New image previews will appear here -->
                            </div>

                            <!-- Existing Images -->
                            @if($product->productImages && count($product->productImages) > 0)
                            <div class="mb-3">
                                <h5>Existing Images ({{ count($product->productImages) }})</h5>
                                <div class="row">
                                    @foreach($product->productImages as $image)
                                    <div class="col-md-3 mb-3" id="image-{{ $image->id }}">
                                        <div class="card h-100">
                                            <img src="{{ asset($image->image) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Product Image">
                                            <div class="card-body p-2">
                                                <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}" 
                                                   class="btn btn-danger btn-sm w-100"
                                                   onclick="return confirm('Are you sure you want to delete this image?')">
                                                    <i class="fas fa-trash"></i> Remove
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <div class="alert alert-warning">
                                <h5 class="mb-0">No Images Added Yet</h5>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Product
                        </button>
                        <a href="{{ url('admin/products') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const productImages = document.getElementById('productImages');
    const newImagePreview = document.getElementById('newImagePreview');
    const newImageCountBadge = document.getElementById('newImageCountBadge');
    const form = document.getElementById('productForm');
    const activeTabInput = document.getElementById('activeTab');
    
    // Get all tab elements
    const homeTab = document.getElementById('home-tab');
    const seoTab = document.getElementById('seotag-tab');
    const detailsTab = document.getElementById('details-tab');
    const imagesTab = document.getElementById('image-tab');
    const tabButtons = [homeTab, seoTab, detailsTab, imagesTab];

    // Store all newly uploaded files cumulatively
    let allNewFiles = [];

    // Function to save active tab
    function saveActiveTab(tabId) {
        activeTabInput.value = tabId;
        sessionStorage.setItem('activeProductTab', tabId);
    }

    // Function to activate tab based on stored value
    function activateStoredTab() {
        const storedTab = sessionStorage.getItem('activeProductTab');
        
        if (storedTab) {
            const tabToActivate = document.getElementById(storedTab);
            if (tabToActivate) {
                const tab = new bootstrap.Tab(tabToActivate);
                tab.show();
                activeTabInput.value = storedTab;
            }
        } else {
            // Check if there are validation errors on specific tabs
            @if($errors->any())
                const errorFields = {!! json_encode(array_keys($errors->toArray())) !!};
                if (errorFields.some(field => field.includes('image'))) {
                    const tab = new bootstrap.Tab(imagesTab);
                    tab.show();
                    saveActiveTab('image-tab');
                }
            @endif
        }
    }

    // Add click handlers to all tabs
    tabButtons.forEach(tabButton => {
        tabButton.addEventListener('click', function() {
            saveActiveTab(this.id);
        });
    });

    // Function to update the file input with all selected files
    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        
        allNewFiles.forEach(file => {
            dataTransfer.items.add(file);
        });
        
        productImages.files = dataTransfer.files;
    }

    // Function to update new images count
    function updateNewImageCount() {
        const count = allNewFiles.length;
        newImageCountBadge.textContent = `${count} new image${count !== 1 ? 's' : ''}`;
        newImageCountBadge.className = count > 0 ? 'badge bg-success' : 'badge bg-secondary';
    }

    // Function to remove a specific new image
    function removeNewImage(index) {
        allNewFiles.splice(index, 1);
        
        // Refresh the preview
        refreshNewImagePreview();
        
        // Update file input
        updateFileInput();
        
        // Update count
        updateNewImageCount();
    }

    // Function to refresh all new image previews
    async function refreshNewImagePreview() {
        newImagePreview.innerHTML = '';
        
        for (let i = 0; i < allNewFiles.length; i++) {
            const preview = await createNewImagePreview(allNewFiles[i], i);
            if (preview) {
                newImagePreview.appendChild(preview);
            }
        }
    }

    // Function to create image preview for new uploads with remove button
    function createNewImagePreview(file, index) {
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
                    imgContainer.style.position = 'relative';
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'card-img-top';
                    img.style.height = '150px';
                    img.style.objectFit = 'cover';
                    
                    const badge = document.createElement('span');
                    badge.className = 'position-absolute top-0 start-0 badge bg-primary';
                    badge.textContent = 'New';
                    badge.style.zIndex = '1';
                    
                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'btn btn-danger btn-sm position-absolute top-0 end-0 m-1';
                    removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                    removeBtn.style.zIndex = '10';
                    removeBtn.onclick = function(e) {
                        e.preventDefault();
                        removeNewImage(index);
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
    if (productImages) {
        productImages.addEventListener('change', async function() {
            const newFiles = Array.from(this.files);
            
            if (newFiles.length > 0) {
                // Add new files to the cumulative list
                allNewFiles = [...allNewFiles, ...newFiles];
                
                // Clear the file input to allow re-selecting the same files
                this.value = '';
                
                // Update file input with all files
                updateFileInput();
                
                // Refresh all previews
                await refreshNewImagePreview();
                
                // Update count
                updateNewImageCount();
                
                // Make sure we stay on images tab
                const tab = new bootstrap.Tab(imagesTab);
                tab.show();
                saveActiveTab('image-tab');
            }
        });
    }

    // Activate the last active tab on page load
    activateStoredTab();

    // Handle browser back/forward navigation
    window.addEventListener('popstate', function() {
        activateStoredTab();
    });

    // Form submission - ensure all new files are included
    form.addEventListener('submit', function(e) {
        // Store active tab before submit
        saveActiveTab(activeTabInput.value);
    });
});

// Your existing jQuery code
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).on('click','.updateProductColorBtn' , function () {
        var product_id = "{{ $product->id }}";
        var prod_color_id = $(this).val();
        var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
        
        if(qty <= 0){
            alert('Quantity is required');
            return false;
        }

        var data = {
            'product_id': product_id,
            'prod_color_id' : prod_color_id,
            'qty' : qty
        };

        $.ajax({
            type : "POST",
            url : "/admin/product-color/"+prod_color_id,
            data : data,
            success : function (response) {
                alert(response.message);
            }
        });
    });

    $(document).on('click','.deleteProductColorBtn' , function () {
        var prod_color_id = $(this).val();
        var thisClick = $(this);

        if(confirm('Are you sure you want to delete this color?')) {
            $.ajax({
                type : "GET",
                url : "/admin/product-color/"+prod_color_id+"/delete",
                success : function (response) {
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message);
                }
            });
        }
    });
});
</script>

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
    
    .nav-link.active {
        font-weight: 600;
        background-color: #f8f9fa !important;
        border-bottom-color: transparent !important;
    }
    
    .tab-pane {
        transition: opacity 0.15s linear;
    }
    
    .badge {
        font-size: 0.7rem;
        padding: 0.25rem 0.5rem;
    }
    
    .btn-outline-danger {
        border-color: #dc3545;
        color: #dc3545;
    }
    
    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }
    
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
@endsection