<div>
    <input id="user_agree" type="checkbox" value="agree" name="user_agree" class="form-checkbox h-4 w-4"
        wire:model="isChecked">
    <span>我同意yumeal網站的隱私權及網站使用條款</span>
    <br>

    @if ($isChecked)
        <button type="submit" name="action" value="register">完成註冊</button>
    @else
        <button type="submit" name="action" value="register" disabled>完成註冊(請記得打勾)</button>
    @endif

</div>
