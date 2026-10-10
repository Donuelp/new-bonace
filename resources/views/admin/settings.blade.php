@extends('layouts.app')

@section('title', 'General Settings')

@section('content')
<div class="py-4">
    <div class="mb-4">
        <h1 class="h3 mb-1">General Settings</h1>
        <p class="text-muted mb-0">Manage the contact details and social links used throughout your website.</p>
    </div>

    <form method="POST" action="{{ route('admin.settings.update') }}">
        @csrf
        @method('PUT')

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h2 class="h5 mb-3">Business Information</h2>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="companyName" class="form-label">Business Name</label>
                        <input type="text" id="companyName" name="company_name" class="form-control" value="{{ old('company_name', $settings['company_name']) }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @foreach([
                ['id' => 'addresses', 'title' => 'Addresses', 'placeholder' => 'Enter a business or showroom address', 'type' => 'text', 'name' => 'addresses'],
                ['id' => 'phones', 'title' => 'Phone Numbers', 'placeholder' => 'Enter a phone number', 'type' => 'tel', 'name' => 'phone_numbers'],
                ['id' => 'emails', 'title' => 'Email Addresses', 'placeholder' => 'Enter an email address', 'type' => 'email', 'name' => 'emails'],
            ] as $group)
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h2 class="h5 mb-0">{{ $group['title'] }}</h2>
                                <button type="button" class="btn btn-sm btn-outline-primary" data-add-field="{{ $group['id'] }}">
                                    <i class="bi bi-plus-lg"></i> Add
                                </button>
                            </div>
                            <div id="{{ $group['id'] }}Fields" class="vstack gap-2">
                                @foreach(old($group['name'], $settings[$group['name']]) as $index => $value)
                                    <div class="input-group">
                                        <input type="{{ $group['type'] }}" name="{{ $group['name'] }}[]" class="form-control" value="{{ $value }}" placeholder="{{ $group['placeholder'] }}">
                                        <button type="button" class="btn btn-outline-danger" data-remove-field aria-label="Remove"><i class="bi bi-trash"></i></button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card border-0 shadow-sm mt-4">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h2 class="h5 mb-1">Social Media Links</h2>
                        <p class="small text-muted mb-0">Add the platform name and its public profile URL.</p>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-add-field="socials"><i class="bi bi-plus-lg"></i> Add Social Link</button>
                </div>
                <div id="socialsFields" class="vstack gap-2">
                    @forelse(old('socials', $settings['socials']) as $index => $social)
                        <div class="row g-2 align-items-center social-row">
                            <div class="col-md-3"><input type="text" name="socials[{{ $index }}][platform]" class="form-control" value="{{ $social['platform'] ?? '' }}" placeholder="Platform e.g. Instagram"></div>
                            <div class="col-md-8"><input type="url" name="socials[{{ $index }}][url]" class="form-control" value="{{ $social['url'] ?? '' }}" placeholder="https://"></div>
                            <div class="col-md-1"><button type="button" class="btn btn-outline-danger w-100" data-remove-field aria-label="Remove"><i class="bi bi-trash"></i></button></div>
                        </div>
                    @empty
                        <div class="row g-2 align-items-center social-row">
                            <div class="col-md-3"><input type="text" name="socials[0][platform]" class="form-control" placeholder="Platform e.g. Instagram"></div>
                            <div class="col-md-8"><input type="url" name="socials[0][url]" class="form-control" placeholder="https://"></div>
                            <div class="col-md-1"><button type="button" class="btn btn-outline-danger w-100" data-remove-field aria-label="Remove"><i class="bi bi-trash"></i></button></div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4 mb-4">
            <button type="submit" class="btn btn-warning fw-semibold px-4"><i class="bi bi-check-lg me-1"></i> Save Settings</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    const fieldGroups = {
        addresses: { container: 'addressesFields', name: 'addresses[]', type: 'text', placeholder: 'Enter a business or showroom address' },
        phones: { container: 'phonesFields', name: 'phone_numbers[]', type: 'tel', placeholder: 'Enter a phone number' },
        emails: { container: 'emailsFields', name: 'emails[]', type: 'email', placeholder: 'Enter an email address' },
    };

    document.querySelectorAll('[data-add-field]').forEach((button) => {
        button.addEventListener('click', () => {
            const group = button.dataset.addField;
            if (group === 'socials') {
                const container = document.getElementById('socialsFields');
                const index = container.querySelectorAll('.social-row').length;
                container.insertAdjacentHTML('beforeend', `<div class="row g-2 align-items-center social-row"><div class="col-md-3"><input type="text" name="socials[${index}][platform]" class="form-control" placeholder="Platform e.g. Instagram"></div><div class="col-md-8"><input type="url" name="socials[${index}][url]" class="form-control" placeholder="https://"></div><div class="col-md-1"><button type="button" class="btn btn-outline-danger w-100" data-remove-field aria-label="Remove"><i class="bi bi-trash"></i></button></div></div>`);
                return;
            }

            const config = fieldGroups[group];
            document.getElementById(config.container).insertAdjacentHTML('beforeend', `<div class="input-group"><input type="${config.type}" name="${config.name}" class="form-control" placeholder="${config.placeholder}"><button type="button" class="btn btn-outline-danger" data-remove-field aria-label="Remove"><i class="bi bi-trash"></i></button></div>`);
        });
    });

    document.addEventListener('click', (event) => {
        const button = event.target.closest('[data-remove-field]');
        if (button) button.closest('.input-group, .social-row').remove();
    });
</script>
@endpush
@endsection
