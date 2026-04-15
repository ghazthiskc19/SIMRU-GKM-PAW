<div class="footer-submit">
    <button type="submit" class="btn-submit" {!! isset($formId) ? 'form="'.$formId.'"' : '' !!}>
        {{ $teks ?? 'Submit' }}
        <svg class="send-icon" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
    </button>
</div>