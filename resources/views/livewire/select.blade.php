<div>

    <select wire:model="city" name="city">
        <option value="">-- 請選擇縣市 --</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>

    <select wire:model="landmark" name="landmark">
        <option value="">-- 請選擇地標 --</option>
        @foreach ($landmarks as $landmark)
        <option value="{{ $landmark->id }}">{{ $landmark->name }}</option>
        @endforeach
    </select>





</div>
