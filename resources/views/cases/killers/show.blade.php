<x-layout>
    <div class="page">
        <!-- Background Effect -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="page-container">
            <a href="{{ route('cases.killers.index') }}" class="details-back">
                ← Back to all serial killers
            </a>

            <div class="details-card">
                <!-- Header -->
                <div class="details-header">
                    <h1>{{ $serial_killer->nickname }}</h1>
                    <p>
                        {{ $serial_killer->name ?? 'Unknown' }}
                        •
                        {{ $serial_killer->ageText }}
                        •
                        {{ $serial_killer->country }}
                    </p>
                </div>

                <!-- Main Information -->
                <div class="details-grid">
                    <!-- Image -->
                    <div class="details-image">
                        <img
                            src="{{ $serial_killer->image ? asset('images/killers/' . $serial_killer->image) : asset('images/default-image.png') }}"
                            alt="{{ $serial_killer->nickname }}"
                        >
                    </div>

                    <!-- Overview -->
                    <div class="details-content">
                        <section class="content-panel">
                            <h2 style="margin-bottom:1rem">Victim Overview</h2>
                            <div class="details-stats">
                                <div class="details-stat details-killed">
                                    <p>Claimed Killed</p>
                                    <span>
                                        {{ $serial_killer->victim_count['killed']['claimed'] ?? 'N/A' }}
                                    </span>
                                </div>

                                <div class="details-stat details-killed-confirmed">
                                    <p>Confirmed Killed</p>
                                    <span>
                                        {{ $serial_killer->victim_count['killed']['confirmed'] ?? 'N/A' }}
                                    </span>
                                </div>

                                <div class="details-stat details-wounded">
                                    <p>Wounded</p>
                                    <span>
                                        {{ $serial_killer->victim_count['wounded'] ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </section>

                        <!-- Description -->
                        <section class="content-panel">
                            <h2>Description</h2>
                            <p class="details-description">
                                {{ $serial_killer->description ?? 'No description available.' }}
                            </p>
                        </section>
                    </div>
                </div>

                @php
                    $victimData = $serial_killer->victimRecord->count ?? null;

                    if (is_string($victimData)) {
                        $victimData = json_decode($victimData, true);
                    }

                    $killedVictims = $victimData['killed'] ?? [];
                    $woundedVictims = $victimData['wounded'] ?? [];
                @endphp

                <!-- Victim Lists -->
                <div class="details-lists">
                    <!-- Killed Victims -->
                    <section class="details-list">
                        <h2>Killed Victims</h2>
                        @if(count($killedVictims))
                            <ul>
                                @foreach ($killedVictims as $victim)
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

                    <!-- Wounded Victims -->
                    <section class="details-list">
                        <h2>Wounded Victims</h2>
                        @if(count($woundedVictims))
                            <ul>
                                @foreach ($woundedVictims as $victim)
                                    <li class="details-list-item details-wounded-item">
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
                </div>
            </div>

            <!-- Discussion Board -->
            <section class="discussion-board">
                <div class="discussion-header">
                    <div>
                        <h2>Case Discussion</h2>
                        <p>Discuss the case, investigation, psychology, evidence and unanswered questions.</p>
                    </div>

                    <span class="discussion-count">
                        {{ $serial_killer->discussions->count() }}
                        {{ $serial_killer->discussions->count() === 1 ? 'comment' : 'comments' }}
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
                    <form action="{{ route('discussions.store', ['type' => 'serial-killer', 'id' => $serial_killer->id]) }}" method="POST" class="discussion-form">
                        @csrf

                        <label for="content">
                            Join the discussion
                        </label>

                        <textarea name="content" id="content" maxlength="2000" placeholder="Share your thoughts about this case..." required>{{ old('content') }}</textarea>

                        <div class="discussion-form-footer">
                            <span>
                                <span class="character-count">0</span>/2000 characters
                            </span>
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
                    @forelse($serial_killer->discussions->sortByDesc('created_at') as $discussion)
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
                                    <!-- ? = doesn't show error and doesn't crash -->
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
                                        <form action="{{ route('discussions.destroy', $discussion) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?')">
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