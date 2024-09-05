<div class="container scrollable-container">
    @if($ads->count()>0)
        <table class="table-bordered">
            <thead class="background-secondary text-white">
                <tr>
                    <th style="width: 50%;">Titolo</th>
                    <th style="width: 25%;">Data Pubblicazione</th>
                    <th style="width: 15%;">Stato</th>
                    <th style="width: 10%;">Azioni</th>
                </tr>
            </thead>
            <tbody class="background-accent">
                @foreach ($ads as $ad)
                    <tr>
                        <td>{{ $ad->title }}</td>
                        <td>{{ $ad->created_at }}</td>
                        <td>
                            @if ($ad->checked)
                                <p class="text-success"><i class="fas fa-check"></i></p>
                            @elseif ($ad->checked === null)
                                <p class="text-warning"><i class="fas fa-spinner"></i></p>
                            @elseif (!$ad->checked)
                                <p class="text-danger"><i class="fas fa-times"></i></p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('adDetail', $ad->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-search"></i></a>
                            @if(!$ad->checked || $ad->checked)
                                <a href="{{ route('adEdit', $ad->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>Non hai pubblicato nessun annuncio</h3>
    @endif
</div>
