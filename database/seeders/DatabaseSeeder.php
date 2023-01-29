<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'TimeNet Admin',
            'email' => 'yad@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $defaultServiceCategory = \App\Models\Category::factory([
            'name' => 'Service Category',
            'model' => Post::class,
        ])->create();

        $defaultProductCategory = \App\Models\Category::factory([
            'name' => 'Product Category',
            'model' => Post::class,
        ])->create();

        $defaultSolutionCategory = \App\Models\Category::factory([
            'name' => 'Solution Category',
            'model' => Post::class,
        ])->create();

        $defaultArticleCategory = \App\Models\Category::factory([
            'name' => 'Article Category',
            'model' => Post::class,
        ])->create();

        \App\Models\Category::factory(4)->create();

        $services = [
            [
                'title' => 'Full Service ISP',
                'cover_url' => asset('images/wallpapers/31.jpg'),
                'short_content' => 'TimeNet is a modern way, full-service ISP, offering Internet access, and network-related professional solutions.',
                'content' => '
                        <p class="card-text">
                            TimeNet is a modern way, full-service ISP, offering Internet access, and network-related
                            professional solutions.
                        </p>
                        <ul class="list-pointer mb-0">
                            <li class="list-pointer-item">Design.</li>
                            <li class="list-pointer-item">Installation and Management Network</li>
                            <li class="list-pointer-item">Fiber Optics, VoIP, and Surveillance systems</li>
                            <li class="list-pointer-item">Network, Access doors</li>
                        </ul>
                        ',
            ],
            [
                'title' => 'High Quality Support',
                'cover_url' => asset('images/wallpapers/22.jpg'),
                'short_content' => 'TimeNet makes a concerted effort to keep customers informed and to remedy problems in the shortest possible times, and will continue to make high quality support one of its primary goals.',
                'content' => '
                        <p class="card-text">
                            TimeNet makes a concerted effort to keep customers informed and to remedy problems in the
                            shortest possible times, and will continue to make high quality support one of its primary
                            goals.
                        </p>
                        <ul class="list-pointer mb-0">
                            <li class="list-pointer-item">Open Ticket System</li>
                            <li class="list-pointer-item">Email and Phone Calling</li>
                            <li class="list-pointer-item">24/7 Availability</li>
                        </ul>
                        ',
            ],
            [
                'title' => 'Security Appliances & Firewalls',
                'cover_url' => asset('images/wallpapers/10.jpg'),
                'short_content' => 'Discover an easier way to manage network security of your organization.',
                'content' => '
                        <p class="card-text">Provides an easier way to manage network security of your organization.</p>
                        <ul class="list-pointer mb-0">
                            <li class="list-pointer-item">Enterprise Technology</li>
                            <li class="list-pointer-item">Private Equity</li>
                            <li class="list-pointer-item">Sustainability</li>
                        </ul>
                ',
            ],
            [
                'title' => 'Availability',
                'cover_url' => asset('images/wallpapers/10.jpg'),
                'short_content' => 'TimeNet has it is own autonomous system number (ASN) and own IP Public Address, plus a redundant gateway to different IGW to assure high availability in case of outage from one of the IGWs in the region.',
                'content' => '
                          <p class="card-text">
                            TimeNet has it is own autonomous system number (ASN) and own IP Public Address, plus a
                            redundant gateway to different IGW to assure high availability in case of outage from one of
                            the IGWs in the region.
                        </p>
                        ',
            ],
            [
                'title' => 'Future Services',
                'cover_url' => asset('images/wallpapers/22.jpg'),
                'short_content' => 'TimeNet is in the process of researching a future service of integrated data over high speed TCP/IP network connections by increasing number of towers and connecting all of them by fiber optic by ring topology to assure service availability.',
                'content' => '
                         <p class="card-text">
                            TimeNet is in the process of researching a future service of integrated data over high speed TCP/IP network connections by increasing number of towers and connecting all of them by fiber optic by ring topology to assure service availability.
                        </p>
                        ',
            ],
            [
                'title' => 'Network Monitoring',
                'cover_url' => asset('images/wallpapers/31.jpg'),
                'short_content' => '  The PRTG software utilized by TimeNet to monitor customers and we can create an individual account for every customer to monitor their internet connectivity.',
                'content' => '
                        <p class="card-text">
                            The PRTG software utilized by TimeNet to monitor customers and we can create an individual account for every customer to monitor their internet connectivity.
                        </p>
                ',
            ]
        ];

        foreach ($services as $post) {

            $saved_post = \App\Models\Post::create(
                [
                    'author_id' => 1,
                    'type_id' => Post::TYPE_SERVICE,
                    'category_id' => $defaultServiceCategory->id,
                    'title' => $post['title'],
                    'content' => $post['content'],
                    'short_content' => $post['short_content'],
                ]
            );

            $saved_post->addMediaFromUrl($post['cover_url'])
                ->toMediaCollection('cover');
        }

        \App\Models\Post::factory(14)->create([
            'type_id' => Post::TYPE_SOLUTION,
            'category_id' => $defaultSolutionCategory->id,
        ]);
        foreach (Post::where('type_id', Post::TYPE_SOLUTION)->get() as $post) {

            $image = random_int(1, 10);

            $post->addMediaFromUrl(asset('images/wallpapers/' . $image . '.jpg'))
                ->toMediaCollection('cover');
        }

        \App\Models\Post::factory(14)->create([
            'type_id' => Post::TYPE_PRODUCT,
            'category_id' => $defaultProductCategory->id,
        ]);
        foreach (Post::where('type_id', Post::TYPE_PRODUCT)->get() as $post) {

            $image = random_int(1, 10);

            $post->addMediaFromUrl(asset('images/wallpapers/' . $image . '.jpg'))
                ->toMediaCollection('cover');
        }


        $articles = [
            [
                'title' => 'Computer network',
                'cover_url' => asset('images/wallpapers/7.jpg'),
                'short_content' => 'Computer network and sharing resources.',
                'content' => '
                        A computer network is a set of computers sharing resources located on or provided by network nodes. The computers use common communication protocols over digital interconnections to communicate with each other. These interconnections are made up of telecommunication network technologies, based on physically wired, optical, and wireless radio-frequency methods that may be arranged in a variety of network topologies.
                        The nodes of a computer network can include personal computers, servers, networking hardware, or other specialized or general-purpose hosts. They are identified by network addresses, and may have hostnames. Hostnames serve as memorable labels for the nodes, rarely changed after initial assignment. Network addresses serve for locating and identifying the nodes by communication protocols such as the Internet Protocol.
                        Computer networks may be classified by many criteria, including the transmission medium used to carry signals, bandwidth, communications protocols to organize network traffic, the network size, the topology, traffic control mechanism, and organizational intent.
                        Computer networks support many applications and services, such as access to the World Wide Web, digital video, digital audio, shared use of application and storage servers, printers, and fax machines, and use of email and instant messaging applications.
                        ',
            ],
            [
                'title' => '5G technology',
                'cover_url' => asset('images/wallpapers/1.jpg'),
                'short_content' => '5G is the fifth-generation technology standard for broadband cellular networks',
                'content' => '
                      In telecommunications, 5G is the fifth-generation technology standard for broadband cellular networks, which cellular phone companies began deploying worldwide in 2019, and is the planned successor to the 4G networks which provide connectivity to most current cellphones. 5G networks are predicted to have more than 1.7 billion subscribers and account for 25% of the worldwide mobile technology market by 2025, according to the GSM Association and Statista.
                      Like its predecessors, 5G networks are cellular networks, in which the service area is divided into small geographical areas called cells. All 5G wireless devices in a cell are connected to the Internet and telephone network by radio waves through a local antenna in the cell. The new networks have higher download speeds, eventually up to 10 gigabits per second (Gbit/s). In addition to 5G being faster than existing networks, 5G has higher bandwidth and can thus connect more different devices, improving the quality of Internet services in crowded areas.[4] Due to the increased bandwidth, it is expected the networks will increasingly be used as general internet service providers (ISPs) for laptops and desktop computers, competing with existing ISPs such as cable internet, and also will make possible new applications in internet-of-things (IoT) and machine-to-machine areas. Cellphones with 4G capability alone are not able to use the 5G networks.
                      ',
            ],
            [
                'title' => 'LTE (telecommunication)',
                'cover_url' => asset('images/wallpapers/8.jpg'),
                'short_content' => 'LTE is a standard for wireless broadband communication.',
                'content' => '
                       In telecommunications, long-term evolution (LTE) is a standard for wireless broadband communication for mobile devices and data terminals, based on the GSM/EDGE and UMTS/HSPA standards. It improves on those standards capacity and speed by using a different radio interface and core network improvements. LTE is the upgrade path for carriers with both GSM/UMTS networks and CDMA2000 networks. Because LTE frequencies and bands differ from country to country, only multi-band phones can use LTE in all countries where it is supported.
                       The standard is developed by the 3GPP (3rd Generation Partnership Project) and is specified in its Release 8 document series, with minor enhancements described in Release 9. LTE is also called 3.95G and has been marketed as "4G LTE" and "Advanced 4G", but it does not meet the technical criteria of a 4G wireless service, as specified in the 3GPP Release 8 and 9 document series for LTE Advanced. The requirements were set forth by the ITU-R organisation in the IMT Advanced specification; but, because of market pressure and the significant advances that WiMAX, Evolved High Speed Packet Access, and LTE bring to the original 3G technologies, ITU later decided that LTE and the aforementioned technologies can be called 4G technologies. The LTE Advanced standard formally satisfies the ITU-R requirements for being considered IMT-Advanced. To differentiate LTE Advanced and WiMAX-Advanced from current 4G technologies, ITU has defined the latter as "True 4G".
                ',
            ],
        ];

        foreach ($articles as $post) {

            $saved_post = \App\Models\Post::factory(15)->create(
                [
                    'author_id' => 1,
                    'type_id' => Post::TYPE_ARTICLE,
                    'category_id' => $defaultArticleCategory->id,
//                    'title' => $post['title'],
//                    'content' => $post['content'],
//                    'short_content' => $post['short_content'],
                ]
            );

            foreach (Post::where('type_id', Post::TYPE_ARTICLE)->get() as $db_post) {

                $image = random_int(1, 10);

                $db_post->addMediaFromUrl(asset('images/wallpapers/' . $image . '.jpg'))
                    ->toMediaCollection('cover');
            }


        }
    }
}
