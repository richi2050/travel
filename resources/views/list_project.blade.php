<ul class="tree">
    @foreach($data as $dat)
        <li>
            <input type="checkbox" id="p-{{ $dat['project']['id'] }}" />
            <label data-type="1" data-id="{{ $dat['project']['id'] }}" class="tree_label" for="p-{{ $dat['project']['id'] }}">
                <i class="fa fa-suitcase" aria-hidden="true"></i>
                {{ $dat['project']['name'] }}
            </label>
            <?php //dd($dat); ?>
            <ul>
                @foreach($dat['subproject'] as $dats)
                <li>
                    <input type="checkbox" id="s-{{$dats['id']}}" />
                    <label  data-type="2" class="tree_label" for="s-{{$dats['id']}}">
                        <i class="fa fa-folder-open" aria-hidden="true"></i> {{ $dats['name'] }}
                    </label>
                    <ul>
                        @foreach($dat['travel'] as $datr)
                        <li>
                            <i class="fa fa-plane" style="color: #2C398E;" aria-hidden="true"></i>
                            <span class="tree_label" data-type="3" data-id="{{ $datr['id'] }}" style="cursor: pointer;">{{ $datr['name'] }}</span>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
</ul>