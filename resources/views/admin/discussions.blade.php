<x-layout>
    <div class="page">
        <!-- Background Effect -->
        <div class="psychology-background">
            <div class="glow glow-left"></div>
            <div class="glow glow-right"></div>
            <div class="grid-overlay"></div>
        </div>

        <div class="page-container">
            <div class="admin-header">
                <div>
                    <p class="eyebrow">Admin</p><br>
                    <h1>Discussion Moderation</h1>
                    <p>Review and manage comments posted throughout Crime Vault.</p>
                </div>

                <span class="admin-discussion-count">
                    {{ $discussions->count() }}
                    {{ $discussions->count() === 1 ? 'comment' : 'comments' }}
                </span>
            </div>

            @if(session('success'))
                <div class="discussion-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="admin-discussions">
                @forelse($discussions as $discussion)
                    <article class="admin-discussion-card">
                        <div class="admin-discussion-top">
                            <div>
                                <strong>
                                    {{ $discussion->user->name ?? 'Deleted User' }}
                                </strong>

                                @if($discussion->user?->isAdmin())
                                    <span class="discussion-admin-badge">
                                        Admin
                                    </span>
                                @endif
                            </div>

                            <span class="admin-discussion-date">
                                {{ $discussion->created_at->timezone('Europe/Riga')->format('d M Y, H:i') }}
                            </span>
                        </div>

                        <p class="admin-discussion-content">
                            {{ $discussion->content }}
                        </p>

                        <div class="admin-discussion-info">
                            <div>
                                <span>Case</span>

                                <strong>
                                    <!-- checks of the comments belongs to a serial killer -->
                                    @if($discussion->discussable instanceof \App\Models\SerialKiller)
                                        {{ $discussion->discussable->nickname }}
                                    <!-- checks if the comments belongs to an unsolved case -->
                                    @elseif($discussion->discussable instanceof \App\Models\UnsolvedCase)
                                        {{ $discussion->discussable->name }}
                                    @else
                                        Unknown
                                    @endif
                                </strong>
                            </div>

                            <div>
                                <span>Case Type</span>

                                <strong>
                                    @if($discussion->discussable instanceof \App\Models\SerialKiller)
                                        Serial Killer
                                    @elseif($discussion->discussable instanceof \App\Models\UnsolvedCase)
                                        Unsolved Case
                                    @else
                                        Unknown
                                    @endif
                                </strong>
                            </div>
                        </div>

                        <div class="admin-discussion-actions">
                            <form action="{{ route('discussions.destroy', $discussion) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="discussion-delete">
                                    Delete Comment
                                </button>
                            </form>
                        </div>
                    </article>
                @empty
                    <div class="discussion-empty">
                        <p>There are currently no discussion comments to moderate.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>