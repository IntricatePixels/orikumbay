@if (get_row_layout() == 'faqs_new_layout')
    <section class="block new faq faq-new-layout px-4 px-md-0 py-5 in-page-section" id="faq-{{ get_row_index() }}" data-section-name="">
        <div class="container">
            <div class="row d-flex justify-content-center mb-4">
                <div class="col-lg-9 col">
                    @if (get_sub_field('header'))
                        <h2 class="font-black mb-3 pt-5">
                            {{ the_sub_field('header') }}</h2>
                    @endif
                    @if (get_sub_field('subhead'))
                        <p class="fs-6 text-center mt-3 mb-45 px-lg-5">{{ the_sub_field('subhead') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if (have_rows('faq'))
                        <div class="accordion" id="accordionFAQ">
                            @php $faq_a = 0 @endphp
                            @while (have_rows('faq'))
                                @php the_row() @endphp
                                  <div class="accordion-item" id="heading-{{ $faq_a }}">
                                      <h2 class="accordion-header">
                                        <button class="accordion-button bg-light <?php if ($faq_a != 0) { echo 'collapsed'; } ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq_a }}" aria-expanded="true" aria-controls="collapse{{ $faq_a }}">
                                            {{ the_sub_field('question') }}
                                        </button>
                                      </h2>
                                      <div id="collapse-{{ $faq_a }}" class="accordion-collapse collapse <?php if ($faq_a == 0) { echo 'show'; } ?>" aria-labelledby="heading-{{ $faq_a }}" data-bs-parent="#accordionFAQ">
                                        <div class="accordion-body">
                                            <div class="faq-content pt-2 px-3">
                                              {{ the_sub_field('answer') }}
                                            </div>
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

            <div class="row d-flex justify-content-center mt4 mb-5">
                <div class="col-lg-8 col text-center mt-5">

                    @if (get_sub_field('footer_header'))
                        <h2 class="font-black mb-3 pt-0">
                            {{ the_sub_field('footer_header') }}</h2>
                    @endif
                    @if (get_sub_field('footer_subhead'))
                        <p class="fs-6 text-center mt-3 mb-4 px-lg-5">{{ the_sub_field('footer_subhead') }}</p>
                    @endif

                    @php $footer_button = get_sub_field('footer_button') @endphp
                    @if ($footer_button)
                        @php
                            $link_url = $footer_button['url'];
                            $link_title = $footer_button['title'];
                            $link_target = $footer_button['target'] ? $footer_button['target'] : '_self';
                        @endphp
                        <a class="btn btn-brown-gradient px-5" href="{{ esc_url($link_url) }}"
                            target="{{ esc_attr($link_target) }}">{{ esc_html($link_title) }}</a>
                    @endif

                </div>
            </div>
        </div>


    </section>
@endif
