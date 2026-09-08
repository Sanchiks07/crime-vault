<x-layout>
    <div class="page">
        <!-- Background Effect -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="page-container">
            <a href="{{ route('cases.unsolved.index') }}" class="details-back">
                ← Back to all unsolved cases
            </a>

            <div class="details-card">
                <!-- Header -->
                <div class="details-header">
                    <h1>{{ $unsolved_case->name }}</h1>
                    <p>{{ $unsolved_case->country }}</p>
                </div>

                @php
                    $victims = is_string($unsolved_case->count)
                        ? json_decode($unsolved_case->count, true)
                        : $unsolved_case->count;

                    $suspects = is_string($unsolved_case->suspects)
                        ? json_decode($unsolved_case->suspects, true)
                        : $unsolved_case->suspects;

                    $victims = $victims ?? [];
                    $suspects = $suspects ?? [];
                @endphp

                <!-- Main Information -->
                <div class="details-grid">
                    <!-- Image -->
                    <div class="details-image">
                        <img
                            src="{{ $unsolved_case->image ? asset('images/unsolved/' . $unsolved_case->image) : asset('images/default-image.png') }}"
                            alt="{{ $unsolved_case->name }}"
                        >
                    </div>

                    <!-- Overview -->
                    <div class="details-content">
                        <section class="content-panel">
                            <h2 style="margin-bottom:1rem">Case Overview</h2>
                            <div class="details-stats">
                                <div class="details-stat details-killed">
                                    <p>Total Victims</p>
                                    <span>
                                        {{ is_array($victims) ? count($victims) : 'N/A' }}
                                    </span>
                                </div>

                                <div class="details-stat details-suspects">
                                    <p>Suspects Listed</p>
                                    <span>
                                        {{ is_array($suspects) ? count($suspects) : 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </section>

                        <!-- Description -->
                        <section class="content-panel">
                            <h2>Description</h2>

                            <p class="details-description">
                                {{ $unsolved_case->description ?? 'No description available.' }}
                            </p>
                        </section>
                    </div>
                </div>

                <!-- Victim and Suspect Lists -->
                <div class="details-lists">
                    <!-- Victims -->
                    <section class="details-list">
                        <h2>Victims</h2>
                        @if(!empty($victims))
                            <ul>
                                @foreach($victims as $victim)
                                    <li class="details-list-item details-killed-item">
                                        <span class="details-name">
                                            {{ $victim['name'] ?? 'Unknown' }}
                                        </span>

                                        <span class="details-age">
                                            (Age: {{ $victim['age'] ?? 'N/A' }})
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="details-empty">
                                No data available.
                            </p>
                        @endif
                    </section>

                    <!-- Suspects -->
                    <section class="details-list">
                        <h2>Suspects</h2>
                        @if(!empty($suspects))
                            <ul>
                                @foreach($suspects as $suspect)
                                    <li class="details-list-item details-suspects-item">
                                        <span class="details-name">
                                            {{ $suspect['name'] ?? 'Unknown' }}
                                        </span>

                                        <span class="details-age">
                                            (Age: {{ $suspect['age'] ?? 'N/A' }})
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="details-empty">
                                No data available.
                            </p>
                        @endif
                    </section>
                </div>
            </div>

            <!-- Discussion Board -->
            <section class="discussion-board">
                <div class="discussion-header">
                    <div>
                        <h2>Case Discussion</h2>
                        <p>Share your thoughts, theories and observations about this unresolved case.</p>
                    </div>

                    <span class="discussion-count">
                        {{ $unsolved_case->discussions->count() }}
                        {{ $unsolved_case->discussions->count() === 1 ? 'comment' : 'comments' }}
                    </span>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="discussion-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Validation Errors -->
                @if($errors->any())
                    <div class="discussion-errors">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Comment Form -->
                @auth
                    <form action="{{ route('discussions.store', ['type' => 'unsolved-case', 'id' => $unsolved_case->id]) }}" method="POST" class="discussion-form">
                        @csrf

                        <label for="content">
                            Join the discussion
                        </label>

                        <textarea name="content" id="content" rows="5" maxlength="2000" placeholder="Share your thoughts or theories about this case..." required>
                            {{ old('content') }}
                        </textarea>

                        <div class="discussion-form-footer">
                            <span>Maximum 2000 characters</span>
                            <button type="submit">Post Comment</button>
                        </div>
                    </form>
                @else
                    <div class="discussion-login">
                        <p>
                            Want to join the discussion?
                            <a href="{{ route('login') }}">Log in</a> to post a comment.
                        </p>
                    </div>
                @endauth

                <!-- Comments -->
                <div class="discussion-comments">
                    @forelse($unsolved_case->discussions->sortByDesc('created_at') as $discussion)
                        <article class="discussion-comment">
                            <div class="discussion-comment-header">
                                <div class="discussion-author">
                                    <strong>
                                        {{ $discussion->user->name ?? 'Deleted User' }}
                                    </strong>

                                    @if($discussion->user?->isAdmin())
                                        <span class="discussion-admin-badge">
                                            Admin
                                        </span>
                                    @endif
                                </div>

                                <span>
                                    <!-- ? - doesn't show error and doesn't crash -->
                                    {{ $discussion->created_at?->timezone('Europe/Riga')->format('d M Y, H:i') ?? 'Unknown date' }}
                                </span>
                            </div>

                            <p class="discussion-content">
                                {{ $discussion->content }}
                            </p>

                            @auth
                                @if(auth()->id() === $discussion->user_id)
                                    <details class="discussion-edit">
                                        <summary>Edit</summary>

                                        <form action="{{ route('discussions.update', $discussion) }}" method="POST" class="discussion-edit-form">
                                            @csrf
                                            @method('PATCH')

                                            <textarea name="content" rows="4" maxlength="2000" required>{{ $discussion->content }}</textarea>

                                            <button type="submit">
                                                Save Changes
                                            </button>
                                        </form>
                                    </details>
                                @endif

                                @if(auth()->id() === $discussion->user_id || auth()->user()->isAdmin())
                                    <div class="discussion-actions">
                                        <form action="{{ route('discussions.destroy', $discussion) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="discussion-delete">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </article>
                    @empty
                        <div class="discussion-empty">
                            <p>No comments yet. Be the first to start the discussion.</p>
                        </div>
                    @endforelse
                </div>
            </section>
        </div>
    </div>
</x-layout>