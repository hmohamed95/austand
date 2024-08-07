
<style>

/* Make the div as a badge */


    .counter {
        background-color: rgb(220, 38, 38);
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-block;
        margin: 10px;
        font-weight: bold;
        font-size: 16px;

        /* select none */
        user-select: none;
    }

</style>

<div class="counter">{{ $count }} Registered</div>
