@inject('markdown', 'Parsedown')

@if(isset($reply) && $reply === true)
  <div id="comment-{{ $comment->id }}" class="media">
@else
  <li id="comment-{{ $comment->id }}" class="media">
@endif
    {{-- <img class="mr-3" src="https://www.gravatar.com/avatar/{{ md5($comment->commenter->email) }}.jpg?s=64" alt="{{ $comment->commenter->name }} Avatar"> --}}
    <img class="mr-3 avatar" src="{{ asset(@$comment->commenter->photo) }}" style="height: 40px; width: 40px;border-color: #fff;" />
    <div class="media-body">
        <h5 class="mt-0 mb-1 text-capitalize" style="font-size: 13px;">{{ @$comment->commenter->name }} <small class="text-muted">- {{ @$comment->created_at->diffForHumans() }}</small></h5>
        <div style="white-space: pre-wrap;font-size: 13px;">{!! $markdown->line($comment->comment) !!}</div>

        <p>
            @can('reply-to-comment', $comment)
                <button data-toggle="modal" data-target="#reply-modal-{{ $comment->id }}" class="btn btn-sm btn-link " style="font-size: 11px;">Repondre</button>
            @endcan
            @can('edit-comment', $comment)
                <button data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}" class="btn btn-sm btn-link " style="font-size: 11px;">Modifier</button>
            @endcan
            @can('delete-comment', $comment)
                <a href="{{ url('comments/' . $comment->id) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();" class="btn btn-sm btn-link text-danger " style="font-size: 11px;">Supprimer</a>
                <form id="comment-delete-form-{{ $comment->id }}" action="{{ url('comments/' . $comment->id) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </p>

        @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier le message</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Modifier votre message ici:</label>
                                    <textarea required class="common-textarea form-control" name="message" rows="3">{{ $comment->comment }}</textarea>
                                    {{-- <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary " data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-sm btn-outline-success ">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Repondre au message</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">Laisser un message :</label>
                                    <textarea required class="common-textarea form-control" name="message" rows="3"></textarea>
                                   {{--  <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary " data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-sm btn-outline-success ">Repondre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        <br />{{-- Margin bottom --}}

        @foreach($comment->children as $child)
            @include('comments::_comment', [
                'comment' => $child,
                'reply' => true
            ])
        @endforeach
    </div>
@if(isset($reply) && $reply === true)
  </div>
@else
  </li>
@endif