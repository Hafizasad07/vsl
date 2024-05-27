<?php
$campaign_pages = [
     [
          "cId" => 1,
          "fname" => "yt",
          "pages" => [
               ["type" => "vsl", "page" => "yt/index.php"],
               ["type" => "checkout", "page" => "yt/checkout.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "yt/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                    "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                    "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
               ]],
               ["type" => "upsell2", "page" => "yt/automator2-hb-lk-discount.php","decline-redirect" => [
                    "automator_hb_lk_discount" => ["offer_id" => 4, "product_id" => 92,"previous_product_id" => [13]]
               ]],
               ["type" => "upsell3", "page" => "yt/scb.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
          "cId" => 26,
          "fname" => "quiz_funnel_qv3",
          "pages" => [
               ["type" => "vsl", "page" => "qv3/index.php"],
               ["type" => "checkout", "page" => "qv3/checkout.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "qv3/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                    "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                    "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
               ]],
               ["type" => "upsell2", "page" => "qv3/automator2-hb-lk-discount.php","decline-redirect" => [
                    "automator_hb_lk_discount" => ["offer_id" => 4, "product_id" => 92,"previous_product_id" => [13]]
               ]],
               ["type" => "upsell3", "page" => "qv3/scb.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
          "cId" => 1,
          "fname" => "trustpilot-v4-m",
          "pages" => [
               ["type" => "vsl", "page" => "yt/index.php"],
               ["type" => "checkout", "page" => "yt/checkout-v4-m.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "yt/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                    "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                    "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
               ]],
          ]
     ],
     [
          "cId" => 1,
          "fname" => "trustpilot-v1-d",
          "pages" => [
               ["type" => "vsl", "page" => "yt/index-v1-d.php"],
               ["type" => "checkout", "page" => "yt/checkout-v1-d.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "yt/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                    "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                    "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
               ]],
          ]
     ],
     [
          "cId" => 1,
          "fname" => "trustpilot-v5-d",
          "pages" => [
               ["type" => "vsl", "page" => "yt/index-v5-d.php"],
               ["type" => "checkout", "page" => "yt/checkout-v1-d.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "yt/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                    "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                    "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
               ]],
          ]
     ],
     [
          "cId" => 1,
          "fname" => "yt-book-49",
          "pages" => [
               ["type" => "vsl", "page" => "yt/index-v17-d.php"],
               ["type" => "checkout", "page" => "yt/checkout-v2.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "yt/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                    "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                    "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
               ]],
          ]
     ],
     [
          "cId" => 25,
          "fname" => "lk-free-book",
          "pages" => [
               ["type" => "checkout", "page" => "lk-free-book/index.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
               ],
     [
          "cId" => 1,
          "fname" => "trustpilot-v5-m",
          "pages" => [
               ["type" => "vsl", "page" => "yt/index-v5-m.php"],
               ["type" => "checkout", "page" => "yt/checkout-v4-m.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "yt/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                    "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                    "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
               ]],
          ]
     ],
     [
          "cId" => 5,
          "fname" => "trial-external",
          "pages" => [
               ["type" => "vsl", "page" => "trial-external/index.php"],
               ["type" => "checkout", "page" => "trial-external/checkout.php"],
               ["type" => "upsell1", "page" => "trial-external/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "trial-external/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "trial-external/scb.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
          "cId" => 3,
          "fname" => "members-fr",
          "pages" => [
               ["type" => "vsl", "page" => "members-fr/index.php"],
               ["type" => "checkout", "page" => "members-fr/checkout.php"],
               ["type" => "upsell1", "page" => "members-fr/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "members-fr/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "members-fr/scb.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
          "cId" => 8,
          "fname" => "email-cart-v2",
          "pages" => [
               ["type" => "vsl", "page" => "email-cart-v2/index.php"],
               ["type" => "checkout", "page" => "email-cart-v2/checkout.php"],
               ["type" => "upsell1", "page" => "email-cart-v2/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "email-cart-v2/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "email-cart-v2/scb.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
          "cId" => 8,
          "fname" => "cs-vsl-cart-email-bb",
          "pages" => [
               ["type" => "vsl", "page" => "cs-vsl-cart-email-bb/index.php"],
               ["type" => "checkout", "page" => "cs-vsl-cart-email-bb/checkout.php"],
               ["type" => "upsell1", "page" => "cs-vsl-cart-email-bb/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "cs-vsl-cart-email-bb/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "cs-vsl-cart-email-bb/scb.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/index-v2.php"]
          ]
     ],
     [
          "cId" => 8,
          "fname" => "email-cart-v2-bb",
          "pages" => [
               ["type" => "vsl", "page" => "email-cart-v2-bb/index.php"],
               ["type" => "checkout", "page" => "email-cart-v2-bb/checkout.php"],
               ["type" => "upsell1", "page" => "email-cart-v2-bb/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "email-cart-v2-bb/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "email-cart-v2-bb/scb.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/index-v2.php"]
          ]
     ],
     [
          "cId" => 8,
          "fname" => "cs-vsl-cart-email",
          "pages" => [
               ["type" => "landing", "page" => "cs-vsl-cart-email/index.php"],
               ["type" => "checkout", "page" => "cs-vsl-cart-email/checkout.php"],
               ["type" => "upsell1", "page" => "cs-vsl-cart-email/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "cs-vsl-cart-email/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "cs-vsl-cart-email/scb.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
          "cId" => 8,
          "fname" => "email-cart-v2-discount",
          "pages" => [
               ["type" => "vsl", "page" => "email-cart-v2-discount/index.php"],
               ["type" => "checkout", "page" => "email-cart-v2-discount/checkout.php"],
               ["type" => "upsell1", "page" => "email-cart-v2-discount/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "email-cart-v2-discount/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "email-cart-v2-discount/scb.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
          "cId" => 6,
          "fname" => "cs-trail-home",
          "pages" => [
               ["type" => "vsl", "page" => "cs-trail-home/index.php"],
               ["type" => "checkout", "page" => "cs-trail-home/checkout.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "cs-trail-home/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "cs-trail-home/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "cs-trail-home/scb.php"],
               ["type" => "upsell4", "page" => "cs-trail-home/hbs.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
          "cId" => 6,
          "fname" => "cs-trail-home-v2",
          "pages" => [
               ["type" => "vsl", "page" => "home-n/index-v2.php"],
               ["type" => "checkout", "page" => "yt/checkout-a-v2.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "cs-trail-home/automator-2-pay.php", "onbuy" => "upsell3"]
          ]
     ],
     [
          "cId" => 6,
          "fname" => "return-visitor-discount",
          "pages" => [
               ["type" => "vsl", "page" => "return-visitor-discount/index.php"],
               ["type" => "checkout", "page" => "return-visitor-discount/checkout.php"],
               ["type" => "upsell1", "page" => "return-visitor-discount/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "return-visitor-discount/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "return-visitor-discount/scb.php"],
               ["type" => "upsell4", "page" => "return-visitor-discount/hbs.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
               "cId" => 5,
               "fname" => "black-friday-sale",
               "pages" => [
                    ["type" => "vsl", "page" => "black-friday-sale/index.php"],
                    ["type" => "checkout", "page" => "black-friday-sale/checkout.php"],
                    ["type" => "upsell1", "page" => "black-friday-sale/automator-2-pay.php", "onbuy" => "upsell3"],
                    ["type" => "upsell2", "page" => "black-friday-sale/automator-3-pay-hbs.php"],
                    ["type" => "upsell3", "page" => "black-friday-sale/smm.php"],
                    ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                    ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                    ["type" => "thankyou", "page" => "cs-thanks/"]
               ]
     ],
     [
                    "cId" => 5,
                    "fname" => "return-visitor-discount",
                    "pages" => [
                         ["type" => "vsl", "page" => "return-visitor-discount/index.php"],
                         ["type" => "checkout", "page" => "return-visitor-discount/checkout.php"],
                         ["type" => "upsell1", "page" => "return-visitor-discount/automator-2-pay.php", "onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "return-visitor-discount/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "return-visitor-discount/scb.php"],
                         ["type" => "upsell4", "page" => "return-visitor-discount/hbs.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
     ],
     [
                         "cId" => 6,
                         "fname" => "2nd",
                         "pages" => [
                              ["type" => "checkout", "page" => "2nd/index.php","decline-redirect" => [
                                   "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
                              ],"second-decline" => [
                                   "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
                              ]],
                              ["type" => "upsell1", "page" => "2nd/automator-2-pay.php", "onbuy" => "upsell3"],
                              ["type" => "upsell2", "page" => "2nd/automator-3-pay-hbs.php"],
                              ["type" => "upsell3", "page" => "2nd/scb.php"],
                              ["type" => "thankyou", "page" => "cs-thanks/"]
                         ]
     ],
     [
          "cId" => 6,
          "fname" => "3rd-mobile-visit",
          "pages" => [
               ["type" => "checkout", "page" => "3rd-mobile-visit/index.php","decline-redirect" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
               ],"second-decline" => [
                    "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
               ]],
               ["type" => "upsell1", "page" => "3rd-mobile-visit/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "3rd-mobile-visit/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "3rd-mobile-visit/scb.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
     ],
     [
          "cId" => 6,
          "fname" => "cs-digital-discount",
          "pages" => [
               ["type" => "checkout", "page" => "cs-digital-discount/index.php"],
               ["type" => "upsell1", "page" => "cs-digital-discount/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "cs-digital-discount/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "cs-digital-discount/smm.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
          ]
    ],
    [
     "cId" => 6,
     "fname" => "3rd-desktop-visit",
     "pages" => [
          ["type" => "checkout", "page" => "3rd-desktop-visit/index.php"],
          ["type" => "upsell1", "page" => "3rd-desktop-visit/automator-2-pay.php", "onbuy" => "upsell3"],
          ["type" => "upsell2", "page" => "3rd-desktop-visit/automator-3-pay-hbs.php"],
          ["type" => "upsell3", "page" => "3rd-desktop-visit/scb.php"],
          ["type" => "thankyou", "page" => "cs-thanks/"]
     ]
     ],
     [
          "cId" => 6,
          "fname" => "cs-freeship",
          "pages" => [
               ["type" => "vsl", "page" => "cs-freeship/index.php"],
               ["type" => "checkout","page" => "cs-freeship/checkout.php"],
               ["type" => "upsell1", "page" => "cs-freeship/automator-2-pay.php", "onbuy" => "upsell3"],
               ["type" => "upsell2", "page" => "cs-freeship/automator-3-pay-hbs.php"],
               ["type" => "upsell3", "page" => "cs-freeship/scb.php"],
               ["type" => "upsell4", "page" => "cs-freeship/hbs.php"],
               ["type" => "step-1", "page" => "cs-steps/step-1.php"],
               ["type" => "step-2", "page" => "cs-steps/step-2.php"],
               ["type" => "thankyou", "page" => "cs-thanks/"]
              
          ]
          ],
          [
               "cId" => 14,
               "fname" => "email-automator-discount",
               "pages" => [
                    ["type" => "checkout", "page" => "email-automator-discount/checkout.php"],
                    ["type" => "thankyou", "page" => "email-automator-discount/thanks.php"]
               ]
          ],
          [
               "cId" => 19,
               "fname" => "ot-automator-discount",
               "pages" => [
                    ["type" => "checkout", "page" => "ot-automator-discount/checkout.php"],
                    ["type" => "thankyou", "page" => "ot-automator-discount/thanks.php"]
               ]
          ],
          [
               "cId" => 19,
               "fname" => "ot-credit-secret-builders-discount",
               "pages" => [
                    ["type" => "checkout", "page" => "ot-credit-secret-builder-discount/checkout.php"],
                    ["type" => "thankyou", "page" => "ot-credit-secret-builder-discount/thanks.php"]
               ]
          ],
            
               [
                    "cId" => 14,
                    "fname" => "email-credit-secret-builders-discount",
                    "pages" => [
                         ["type" => "checkout", "page" => "email-credit-secret-builders-discount/checkout.php"],
                         ["type" => "thankyou", "page" => "email-credit-secret-builders-discount/thanks.php"]
                    ]
                    ],
               [
                    "cId" => 8,
                    "fname" => "abandon-cart-free-s-and-h-physical",
                    "pages" => [
                         ["type" => "checkout", "page" => "abandon-cart-free-s-and-h-physical/index.php"],
                         ["type" => "upsell1",  "page" => "abandon-cart-free-s-and-h-physical/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "abandon-cart-free-s-and-h-physical/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "abandon-cart-free-s-and-h-physical/scb.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
               ],
               [
                    "cId" => 8,
                    "fname" => "abandon-cart-free-s-and-h-physical-bb",
                    "pages" => [
                         ["type" => "checkout", "page" => "abandon-cart-free-s-and-h-physical-bb/index.php"],
                         ["type" => "upsell1",  "page" => "abandon-cart-free-s-and-h-physical-bb/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "abandon-cart-free-s-and-h-physical-bb/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "abandon-cart-free-s-and-h-physical-bb/scb.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/thanks-v2.php"]
                    ]
                    ],
               [
                    "cId" => 8,
                    "fname" => "abandon-cart-25-percent-off-sale-physical",
                    "pages" => [
                         ["type" => "checkout", "page" => "abandon-cart-25-percent-off-sale-physical/index.php"],
                         ["type" => "upsell1",  "page" => "abandon-cart-25-percent-off-sale-physical/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "abandon-cart-25-percent-off-sale-physical/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "abandon-cart-25-percent-off-sale-physical/scb.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
               ],
               [
                    "cId" => 8,
                    "fname" => "abandon-cart-25-percent-off-sale-physical-bb",
                    "pages" => [
                         ["type" => "checkout", "page" => "abandon-cart-25-percent-off-sale-physical-bb/index.php"],
                         ["type" => "upsell1",  "page" => "abandon-cart-25-percent-off-sale-physical-bb/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "abandon-cart-25-percent-off-sale-physical-bb/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "abandon-cart-25-percent-off-sale-physical-bb/scb.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/thanks-v2.php"]
                    ]
               ],
               [
                    "cId" => 8,
                    "fname" => "abandon-cart-25-percent-off-sale-with-shippment",
                    "pages" => [
                         ["type" => "checkout", "page" => "abandon-cart-25-percent-off-sale-with-shippment/index.php"],
                         ["type" => "upsell1",  "page" => "abandon-cart-25-percent-off-sale-with-shippment/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "abandon-cart-25-percent-off-sale-with-shippment/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "abandon-cart-25-percent-off-sale-with-shippment/scb.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
               ],
               [
                    "cId" => 8,
                    "fname" => "lk-step-one",
                    "pages" => [
                         ["type" => "checkout", "page" => "lk-step-one/index.php"],
                         ["type" => "upsell1",  "page" => "lk-step-one/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "lk-step-one/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "lk-step-one/scb.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
               ],
               [
                    "cId" => 8,
                    "fname" => "digital-discount-fifty-percent-off",
                    "pages" => [
                         ["type" => "checkout", "page" => "digital-discount-fifty-percent-off/index.php"],
                         ["type" => "upsell1",  "page" => "digital-discount-fifty-percent-off/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "digital-discount-fifty-percent-off/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "digital-discount-fifty-percent-off/scb.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
               ],
               [
                    "cId" => 8,
                    "fname" => "digital-discount-fifty-percent-off-bb",
                    "pages" => [
                         ["type" => "checkout", "page" => "digital-discount-fifty-percent-off-bb/index.php"],
                         ["type" => "upsell1",  "page" => "digital-discount-fifty-percent-off-bb/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "digital-discount-fifty-percent-off-bb/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "digital-discount-fifty-percent-off-bb/scb.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/thanks-v2.php"]
                    ]
               ],
               [
                    "cId" => 8,
                    "fname" => "lk-step-one-free-s-and-h",
                    "pages" => [
                         ["type" => "checkout", "page" => "lk-step-one-free-s-and-h/checkout.php"],
                         ["type" => "upsell1",  "page" => "lk-step-one-free-s-and-h/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "lk-step-one-free-s-and-h/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "lk-step-one-free-s-and-h/smm.php"],
                         ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                         ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
               ],
               [
                    "cId" => 8,
                    "fname" => "lk-step-one-funnel-free-s-and-h",
                    "pages" => [
                         ["type" => "checkout", "page" => "lk-step-one-funnel-free-s-and-h/checkout.php"],
                         ["type" => "upsell1",  "page" => "lk-step-one-funnel-free-s-and-h/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "lk-step-one-funnel-free-s-and-h/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "lk-step-one-funnel-free-s-and-h/scb.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
               ],
               [
                    "cId" => 8,
                    "fname" => "lk-step-one-funnel-free-s-and-h-bb",
                    "pages" => [
                         ["type" => "checkout", "page" => "lk-step-one-funnel-free-s-and-h-bb/checkout.php"],
                         ["type" => "upsell1",  "page" => "lk-step-one-funnel-free-s-and-h-bb/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "lk-step-one-funnel-free-s-and-h-bb/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "lk-step-one-funnel-free-s-and-h-bb/scb.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/thanks-v2.php"]
                    ]
               ],
               [
                    "cId" => 14,
                    "fname" => "email-home-buyer-secret-discount",
                    "pages" => [
                         ["type" => "checkout", "page" => "email-home-buyer-secrets-discount/checkout.php"],
                         ["type" => "thankyou", "page" => "email-home-buyer-secrets-discount/thanks.php"]
                    ]
               ],
               [
                    "cId" => 12,
                    "fname" => "dcln-eml",
                    "pages" => [
                         ["type" => "checkout", "page" => "dcln-eml/checkout.php"],
                         ["type" => "upsell1",  "page" => "dcln-eml/automator-2-pay.php","onbuy" => "upsell3"],
                         ["type" => "upsell2", "page" => "dcln-eml/automator-3-pay-hbs.php"],
                         ["type" => "upsell3", "page" => "dcln-eml/scb.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
               ],
               [
                    "cId" => 13,
                    "fname" => "hbs-cbs-bf-bundle",
                    "pages" => [
                         ["type" => "checkout", "page" => "HBS-CBS-BF-Bundle/index.php"],
                         ["type" => "upsell1", "page" => "HBS-CBS-BF-Bundle/automator.php"],
                         ["type" => "upsell2", "page" => "HBS-CBS-BF-Bundle/scb.php"],
                         ["type" => "thankyou", "page" => "cs-thanks/"]
                    ]
                    ],
                    [
                         "cId" => 15,
                         "fname" => "bys-jan-2024",
                         "pages" => [
                              ["type" => "checkout", "page" => "bys-jan-2024/index.php"],
                              ["type" => "upsell1", "page" => "bys-jan-2024/automator.php"],
                              ["type" => "upsell2", "page" => "bys-jan-2024/scb.php"],
                              ["type" => "thankyou", "page" => "bys-jan-2024/thanks.php"]
                         ]
                         ],
                         [
                              "cId" => 15,
                              "fname" => "group-coaching",
                              "pages" => [
                                   ["type" => "checkout", "page" => "group-coaching/index.php"],
                                  // ["type" => "upsell2", "page" => "group-coaching/scb.php"],
                                   ["type" => "thankyou", "page" => "group-coaching/thanks.php"]
                              ]
                              ],
                              [
                                   "cId" => 16,
                                   "fname" => "ig",
                                   "pages" => [
                                        ["type" => "vsl", "page" =>   "ig/index.php"],
                                        ["type" => "checkout", "page" => "ig/checkout.php"],
                                        ["type" => "upsell1", "page" => "ig/automator-2-pay.php", "onbuy" => "upsell3"],
                                        ["type" => "upsell2", "page" => "ig/automator-3-pay-hbs.php"],
                                        ["type" => "upsell3", "page" => "ig/scb.php"],
                                        ["type" => "upsell4", "page" => "ig/hbs.php"],
                                        ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                                        ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                                        ["type" => "thankyou", "page" => "cs-thanks/"]
                                   ]
                                   ],
                                   [
                                        "cId" => 17,
                                        "fname" => "bys-evergreen",
                                        "pages" => [
                                             ["type" => "checkout", "page" =>   "bys-evergreen/index.php"],
                                             ["type" => "upsell1", "page" =>   "bys-evergreen/automator.php"],
                                             ["type" => "upsell2", "page" =>   "bys-evergreen/scb.php"],
                                             ["type" => "thankyou", "page" =>   "bys-evergreen/thanks.php"]
                                            
                                        ]
                                        ],
                                        [
                                             "cId" => 1,
                                             "fname" => "yt-v2",
                                             "pages" => [
                                                  ["type" => "vsl", "page" => "yt-v2/index.php"],
                                                  ["type" => "checkout", "page" => "yt-v2/checkout.php","decline-redirect" => [
                                                       "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
                                                  ],"second-decline" => [
                                                       "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
                                                  ]],
                                                  ["type" => "upsell1", "page" => "yt-v2/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                                                       "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                                                       "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
                                                  ]],
                                                  ["type" => "upsell2", "page" => "yt-v2/automator2-hb-lk-discount.php","decline-redirect" => [
                                                       "automator_hb_lk_discount" => ["offer_id" => 4, "product_id" => 92,"previous_product_id" => [13]]
                                                  ]],
                                                  ["type" => "upsell3", "page" => "yt-v2/scb.php"],
                                                  ["type" => "thankyou", "page" => "cs-thanks/thanks-v2.php"]
                                             ]
                                        ],
                                        [
                                             "cId" => 1,
                                             "fname" => "checkout-a",
                                             "pages" => [
                                                  ["type" => "vsl", "page" => "yt/index-v15-d.php"],
                                                  ["type" => "checkout", "page" => "yt/checkout-a.php"]
                                        ]
                                             ],
                                             [
                                                  "cId" => 5,
                                                  "fname" => "external-trial",
                                                  "pages" => [
                                                       ["type" => "checkout", "page" => "external-trial/index.php","decline-redirect" => [
                                                            "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
                                                       ],"second-decline" => [
                                                            "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
                                                       ]],
                                                       ["type" => "upsell1", "page" => "external-trial/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                                                            "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                                                            "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
                                                       ]],
                                                       ["type" => "upsell2", "page" => "external-trial/automator2-hb-lk-discount.php","decline-redirect" => [
                                                            "automator_hb_lk_discount" => ["offer_id" => 4, "product_id" => 92,"previous_product_id" => [13]]
                                                       ]],
                                                       ["type" => "upsell3", "page" => "external-trial/scb.php"],
                                                       ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                                                       ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                                                       ["type" => "thankyou", "page" => "cs-thanks/"]
                                                  ]
                                             ],[
                                                  "cId" => 23,
                                                  "fname" => "g-retargating",
                                                  "pages" => [
                                                       ["type" => "checkout", "page" => "g-retargating/index.php","decline-redirect" => [
                                                            "required_offer" => ["offer_id" => 1, "product_id" => 89,"is_book" => "yes"]
                                                       ],"second-decline" => [
                                                            "required_offer" => ["offer_id" => 1, "product_id" => 93,"is_book" => "yes"]
                                                       ]],
                                                       ["type" => "upsell1", "page" => "g-retargating/automator-2-pay.php", "onbuy" => "upsell3","decline-redirect" => [
                                                            "automator_liftime_offer" => ["offer_id" => 1, "product_id" => 91,"previous_product_id" => [11]],
                                                            "automator_monthly_offer" => ["offer_id" => 5, "product_id" => 90, "previous_product_id" => [14]]
                                                       ]],
                                                       ["type" => "upsell2", "page" => "g-retargating/automator2-hb-lk-discount.php","decline-redirect" => [
                                                            "automator_hb_lk_discount" => ["offer_id" => 4, "product_id" => 92,"previous_product_id" => [13]]
                                                       ]],
                                                       ["type" => "upsell3", "page" => "g-retargating/scb.php"],
                                                       ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                                                       ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                                                       ["type" => "thankyou", "page" => "cs-thanks/"]
                                                  ]
                                                       ],
                                                  [
                                                  "cId" => 1,
                                                  "fname" => "fb",
                                                  "pages" => [
                                                       ["type" => "vsl", "page" => "home-adv/index.php"],
                                                       ["type" => "checkout", "page" => "home-adv/checkout.php"],
                                                       ["type" => "upsell1", "page" => "home-adv/automator-2-pay.php", "onbuy" => "upsell3"],
                                                       ["type" => "upsell2", "page" => "home-adv/automator2-hb-lk-discount.php"],
                                                       ["type" => "upsell3", "page" => "home-adv/scb.php"],
                                                       ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                                                       ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                                                       ["type" => "thankyou", "page" => "cs-thanks/"]
                                                  ]
                                                  ],
                                                  [
                                                       "cId" => 21,
                                                       "fname" => "fb-organic",
                                                       "pages" => [
                                                            ["type" => "vsl", "page" => "index-v2.php"],
                                                            ["type" => "checkout", "page" => "home-n-v1/checkout.php"],
                                                            ["type" => "upsell1", "page" => "home-n-v1/automator-2-pay.php", "onbuy" => "upsell3"],
                                                            ["type" => "upsell2", "page" => "home-n-v1/automator2-hb-lk-discount.php"],
                                                            ["type" => "upsell3", "page" => "home-n-v1/scb.php"],
                                                            ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                                                            ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                                                            ["type" => "thankyou", "page" => "cs-thanks/"]
                                                       ]
                                                  ],
                                                  [
                                                       "cId" => 22,
                                                       "fname" => "pmax",
                                                       "pages" => [
                                                            ["type" => "vsl", "page" => "home-adv/index-v2.php"],
                                                            ["type" => "checkout", "page" => "home-adv/checkout-v2.php"],
                                                            ["type" => "upsell1", "page" => "home-adv/automator-2-pay-v2.php", "onbuy" => "upsell3"],
                                                            ["type" => "upsell2", "page" => "home-adv/automator2-hb-lk-discount-v2.php"],
                                                            ["type" => "upsell3", "page" => "home-adv/scb-v2.php"],
                                                            ["type" => "step-1", "page" => "cs-steps/step-1.php"],
                                                            ["type" => "step-2", "page" => "cs-steps/step-2.php"],
                                                            ["type" => "thankyou", "page" => "cs-thanks/"]
                                                       ]
                                                  ],

];


$default_product_id = 70;