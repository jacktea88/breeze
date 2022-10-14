<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <input id="user_agree1" type="checkbox" value="agree" name="user_agree1" class="form-checkbox h-4 w-4"
        wire:model="isChecked1">
    <span>我同意yumeal網站的隱私權及網站使用條款</span>
    <br>

    @if ($isChecked1)
        <button type="submit" name="action" value="register">先完成註冊</button>
    @else
        <button type="submit" name="action" value="register" disabled>先完成註冊(請記得打勾)</button>
    @endif

{{-- check={{$isChecked1}} --}}
</div>
