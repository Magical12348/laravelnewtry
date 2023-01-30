<div class="search-wrapper">
    <div class="input-group">
        <img class="search-icon" src="{{ asset('images/search.gif') }}" alt="search icon">
        <input class="search-input" wire:model.debounce.300ms="search" type="search" placeholder="Enter Course Name">
    </div>
    @if (strlen($search) > 2)
        <div class="search-container">
            <ul>
                @forelse ($searchResults as $result)
                    <li>
                        <a href="{{ route('course.details', $result->slug) }}">
                            {{ $result->title }}
                        </a>
                    </li>
                @empty
                    <li>no course found</li>
                @endforelse
            </ul>
        </div>
    @endif
</div>
