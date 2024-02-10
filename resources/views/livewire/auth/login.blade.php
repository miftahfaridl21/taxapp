<div class="d-flex align-content-center mt-5 mx-5">
    <div class="container bg-light p-3" style="width: 40%">
        <div class="card">
            <div class="card-body">
                <form wire:submit="loginUser">
                    <h5 class="text-center">LOGIN WEB APP</h5>
                    <div class="mb-2 mx-2">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Username" wire:model="username">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 mx-2">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password" wire:model="password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2 mx-2 d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
