<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="upload">
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" id="file" wire:model="file">
            @error('file')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select id="type" wire:model="type">
                <option value="">Select type</option>
                <option value="latestVideos">Latest Videos</option>
                <option value="latestNews">Latest News</option>
                <option value="latestGallery">Latest Gallery</option>
            </select>
            @error('type')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="likes">Likes</label>
            <input type="number" id="likes" wire:model="likes" min="0">
            @error('likes')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="views">Views</label>
            <input type="number" id="views" wire:model="views" min="0">
            @error('views')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
