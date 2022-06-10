# Embeds

This theme ships some embeds that hide the complexity of rendering the same elements over and over again with the correct HTML.

## Modal

Modal has been implemented to simplify the use of the [Tabler Modal component](https://preview.tabler.io/modals.html)

### Parameters
`modal` embed, can be used with 1 parameter:

| Parameter | Description                                                             |   Type    |          Default          |
|:---------:|-------------------------------------------------------------------------|:---------:|:-------------------------:|
|    id     | Id of the container                                                     | `string`  | `modal-` + random numbers |

### Content
`modal` embed, has 2 common blocks:

|    Block     | Description                                                |
|:------------:|------------------------------------------------------------|
|   modal_id   | Will be used if `id` parameter is not found (deprecated!)  |
| modal_title  | Title in the modal header                                  |
|  modal_body  | Content of the modal                                       |
| modal_footer | Footer section is normally used for buttons                |
|  modal_size  | Modal size, by default `modal-lg`                          |

See twig file for more blocks, which allow customization of HTML tags, CSS classes and more.

## Next steps

Please go back to the [Tabler bundle documentation](index.md) to find out more about using the theme.
