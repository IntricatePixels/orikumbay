@if (get_row_layout() == 'faqs')
    <section class="block new faq px-4 px-md-0 py-5 in-page-section" id="faq-{{ get_row_index() }}" data-section-name="">
        <div class="container">
            @if (get_sub_field('header'))
                <h2 class="mb-3 pt-5" data-title="{{ the_sub_field('behind_header_text') }}">
                    {{ the_sub_field('header') }}</h2>
            @endif
            @if (get_sub_field('subhead'))
                <p class="block-subheader mt-3 mb-45">{{ the_sub_field('subhead') }}</p>
            @endif
            <div class="row">
                <div class="col">
                    @if (have_rows('faq'))
                        <div class="accordion" id="accordionFAQ">
                            @php $faq_a = 0 @endphp
                            @while (have_rows('faq'))
                                @php the_row() @endphp
                                <div class="accordion-item" id="heading-{{ $faq_a }}">
                                    <button
                                        class="btn card-btn-link p-3 w-100 d-flex justify-content-between align-items-center"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $faq_a }}" aria-expanded="true"
                                        aria-controls="collapse{{ $faq_a }}">
                                        <p>{{ the_sub_field('question') }}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path fill="currentColor"
                                                d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                        </svg>
                                    </button>
                                    <div id="collapse-{{ $faq_a }}"
                                        class="p-3 grey-bg border-top collapse  <?php if ($faq_a == 0) {
                                            echo 'show';
                                        } ?>"
                                        aria-labelledby="heading-{{ $faq_a }}" data-bs-parent="#accordionFAQ">
                                        <div class="faq-content">
                                            {{ the_sub_field('answer') }}
                                        </div>
                                    </div>
                                </div>
                                @php $faq_a++ @endphp
                            @endwhile
                            <!-- faq-schema -->
                            <?php
                    global $schema;
                    $schema = array(
                    '@context'   => "https://schema.org",
                    '@type'      => "FAQPage",
                    'mainEntity' => array()
                    );

                    if ( have_rows('faq') ) {
                        while ( have_rows('faq') ) : the_row();
                            $questions = array(
                                '@type'          => 'Question',
                                'name'           => get_sub_field('question'),
                                'acceptedAnswer' => array(
                                '@type' => "Answer",
                                'text' => get_sub_field('answer')
                                )
                                );
                                array_push($schema['mainEntity'], $questions);

                    endwhile; ?>
                            <?php function generate_faq_schema ($schema) {
                    global $schema;
                    echo '<script type="application/ld+json">'. json_encode($schema) .'</script>';
                    }
                    add_action( 'wp_footer', 'generate_faq_schema', 100 );
                    }
                    ?>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
