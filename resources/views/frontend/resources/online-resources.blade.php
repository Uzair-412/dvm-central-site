@extends('frontend.layouts.app')
@section('title', 'Veterinary Guide | Career and Other Online Resources | Vet Tech')
@section('meta_description', 'Access guides and other free online resources to further your careers and be updated with latest veterinary practices, innovations and instruments.')
@section('meta_keywords', 'Veterinary Resources, Veterinary Guide, Free Vet Online Resources, Vet Tech')
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/online-resources.css') }}" />
@endpush
@section('content')
<main id="online-resources-page" class="relative">
    <div class="online-resources-container">
        <div class="header-img w-full h-full relative overflow-hidden">
            <div class="header-mob-content inline-flex flex-col items-center justify-center text-center sm:hidden p-4 text-center w-full my-4">
                <div class="text-2xl font-semibold text-white">Vet Resources</div>
                <div class="text-xl text-white mt-2 font-semibold" style="color: #003067">Free Vet Resources for Everyone</div>
                <p class="text-gray-200 mt-2 text-sm">Get news, research papers, product launches, videos, animations, medical guides and everything related to veterinary.</p>
            </div>
        </div>

        <h1 class="text-2xl font-semibold tracking-wide primary-black-color mt-20 width">Online Resources</h1>
        <div class="online-resources-wrapper width">
            <div class="flex masonry-col md:-ml-4 md:-mr-4">
                <div class="resource-card mt-6 grid-item md:px-4 relative overflow-hidden z-10">
                    <div class="resource-card-inner bg-white border border-solid border-gray-200 relativer overflow-hidden">
                        <h3 class="lite-blue-bg-color text-white p-2 relative z-10">Career Resources</h3>

                        <ul class="list-disc ml-6 p-2 sm:p-4 text-gray-500 text-sm md:text-base relative">
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://myvetlife.avma.org/current-student/your-career/student-externship-locator">Student externship locator</a>
                                <p>A resource from AVMA that allows you to search for externships by state, special interest, school or organization.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://www.icva.net/">International Council for Veterinary Assessment</a>
                                <p>The ICVA develops veterinary licensing exams including the NAVLE and species-specific exams.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.virmp.org/">Veterinary Internship &amp; Residency Matching Program</a>
                                <p>From the American Association of Veterinary Clinicians.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://www.avma.org/professionaldevelopment/career/vcc/pages/default.aspx">AVMA Veterinary Career Center</a>
                                <p>Includes job postings, resume postings, and other career resources.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://jobs.aavmc.org/careerdev/">AAVMC Career Development</a>
                                <p>Includes career tips, career coaching, resume writing, and a career store.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://www.aphis.usda.gov/aphis/banner/careers">APHIS Careers Program</a>
                                <p>Jobs available from the USDA's Animal and Plant Health Inspection Service (APHIS).</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="resource-card mt-6 grid-item md:px-4 relative overflow-hidden z-10">
                    <div class="resource-card-inner bg-white border border-solid border-gray-200 relativer overflow-hidden">
                        <h3 class="lite-blue-bg-color text-white p-2 relative z-10">Featured Online Resources</h3>

                        <ul class="list-disc ml-6 p-2 sm:p-4 text-gray-500 text-sm md:text-base relative">
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://ebusiness.avma.org/aahsd/study_search.aspx">AVMA Animal Health Studies Database</a>
                                <p>Search for veterinary clinical studies using this resource, launched by the AVMA in June 2016.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.merckvetmanual.com/mvm/index.jsp">Merck Veterinary Manual</a>
                                <p>A foundational resource in veterinary reference.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://consultant.vet.cornell.edu/">CONSULTANT</a>
                                <p>A diagnostic tool from the Cornell University College of Veterinary Medicine. Allows searching by diagnosis or signs and contains a list of "new and noteworthy" articles.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://animaldrugsatfda.fda.gov/">Animal Drugs @ FDA (Green Book)</a>
                                <p>A reference work containing information about drugs used in veterinary medicine. Includes trade names, active ingredients, and patent information.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.fda.gov/AnimalVeterinary/default.htm">FDA Center for Veterinary Medicine</a>
                                <p>Includes information for both consumers and veterinarians focusing on safety, health, science, and research.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.vin.com/">Veterinary Information Network (VIN)</a>
                                <p>A frequently-used portal to veterinary information and research online. Free registration available to veterinary medical students.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.ivis.org/home.asp">International Veterinary Information Service (IVIS)</a>
                                <p>An online publisher of veterinary books and proceedings. Free to veterinarians, veterinary students, and animal health professionals.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="resource-card mt-6 grid-item md:px-4 relative overflow-hidden z-10">
                    <div class="resource-card-inner bg-white border border-solid border-gray-200 relativer overflow-hidden">
                        <h3 class="lite-blue-bg-color text-white p-2 relative z-10">Online Resources - General Reference</h3>

                        <ul class="list-disc ml-6 p-2 sm:p-4 text-gray-500 text-sm md:text-base relative">
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.library.illinois.edu/vex/vetabbrev.htm">Veterinary Abbreviations and Acronyms Guide</a>
                                <p>Veterinary Abbreviations and Acronyms Guide - from the University of Illinois at Urbana-Champaign.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.ahc.umn.edu/rar/refvalues.html">Reference Values for Laboratory Animals</a>
                                <p>Reference Values for Laboratory Animals - includes hematology and clinical values, from the University of Minnesota.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://cal.vet.upenn.edu/projects/ssclinic/refdesk/refrange.htm">Reference Ranges</a>
                                <p>Reference Ranges - for small mammals, birds, and reptiles; from the University of Pennsylvania.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="resource-card mt-6 grid-item md:px-4 relative overflow-hidden z-10">
                    <div class="resource-card-inner bg-white border border-solid border-gray-200 relativer overflow-hidden">
                        <h3 class="lite-blue-bg-color text-white p-2 relative z-10">Calculators</h3>

                        <ul class="list-disc ml-6 p-2 sm:p-4 text-gray-500 text-sm md:text-base relative">
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.medcalc.com/">MedCalc: Online Clinical Calculators</a>
                                <p>Not specific to veterinary medicine.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://csu-cvmbs.colostate.edu/vth/veterinarians/Pages/emergency-drug-calculator.aspx">Veterinary Emergency Drug Calculator</a>
                                <p>From Colorado State University.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="resource-card mt-6 grid-item md:px-4 relative overflow-hidden z-10">
                    <div class="resource-card-inner bg-white border border-solid border-gray-200 relativer overflow-hidden">
                        <h3 class="lite-blue-bg-color text-white p-2 relative z-10">Online Resources - Anatomy</h3>

                        <ul class="list-disc ml-6 p-2 sm:p-4 text-gray-500 text-sm md:text-base relative">
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://vanat.cvm.umn.edu/">Veterinary Anatomy</a>
                                <p>Veterinary Anatomy - from the University of Minnesota.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.cvmbs.colostate.edu/vetneuro/">Veterinary Educational Tools</a>
                                <p>Veterinary Educational Tools - from Colorado State University.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.ucd.ie/vetanat/images/image.html">Veterinary Dissection Images</a>
                                <p>Veterinary Dissection Images - illustrations from University College Dublin.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.vetmed.wsu.edu/VAn308/gross-page.htm">Gross Anatomy of a Dog</a>
                                <p>Gross Anatomy of a Dog - from Washington State University.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://vetmed.illinois.edu/courses/imaging_anatomy/index.html">Imaging Anatomy</a>
                                <p>Imaging Anatomy - from the University of Illinois at Urbana-Champaign.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://smallanimal.vethospital.ufl.edu/clinical-services/support-services/diagnostic-imaging/digital-radiography-dr/radiographic-anatomy/"
                                    >Radiographic Anatomy</a
                                >
                                <p>Radiographic Anatomy - from the UF Small Animal Hospital.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://visgar.vetmed.ufl.edu/">Visual Guides of Animal Reproduction (VisGAR)</a>
                                <p>Visual Guides of Animal Reproduction (VisGAR) - originally known as the DROST project, hosted by UF.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="resource-card mt-6 grid-item md:px-4 relative overflow-hidden z-10">
                    <div class="resource-card-inner bg-white border border-solid border-gray-200 relativer overflow-hidden">
                        <h3 class="lite-blue-bg-color text-white p-2 relative z-10">Online Resources - Large Animals</h3>

                        <ul class="list-disc ml-6 p-2 sm:p-4 text-gray-500 text-sm md:text-base relative">
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://vanat.cvm.umn.edu/">Breeds of Livestock</a>
                                <p>Breeds of Livestock - from Oklahoma State University.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.cvmbs.colostate.edu/vetneuro/">Beef Cattle</a>
                                <p>Beef Cattle - from the American College of Veterinary Surgeons Kansas State University Libraries, part of the Agricultural Network Information Center (AgNIC).</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.ucd.ie/vetanat/images/image.html">Animal Genomics and Improvement Laboratory</a>
                                <p>Animal Genomics and Improvement Laboratory - includes genome mapping results in cattle, swine, and sheep; from the USDA.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.vetmed.wsu.edu/VAn308/gross-page.htm">Horse Genome Project</a>
                                <p>Horse Genome Project - from the University of Kentucky.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="resource-card mt-6 grid-item md:px-4 relative overflow-hidden z-10">
                    <div class="resource-card-inner bg-white border border-solid border-gray-200 relativer overflow-hidden">
                        <h3 class="lite-blue-bg-color text-white p-2 relative z-10">Online Resources - One Health</h3>

                        <ul class="list-disc ml-6 p-2 sm:p-4 text-gray-500 text-sm md:text-base relative">
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://www.avma.org/KB/Resources/Reference/Pages/One-Health.aspx/">One Health - It's All Connected</a>
                                <p>One Health - It's All Connected - the AVMA's One Health Page.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://www.onehealthcommission.org/">One Health Commission</a>
                                <p>One Health Commission - a non-profit working on One Health communication and research; includes links to books, white
                            papers, presentations, videos.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="https://www.onehealthcommission.org/">CDC One Health</a>
                                <p>CDC One Health -includes information on zoonotic diseases, history of One Health, case studies, domestic and foreign One
                            Health activities, bibliography of recent articles and government publications.</p>
                            </li>
                            <li class="leading-loose">
                                <a class="underline-links relative overflow-hidden lite-blue-color" target="_blank" href="http://www.cdc.gov/onehealth/">One Health Case Studies</a>
                                <p>From AAVMC and APTR, these case studies cover microbial influences on health and disease; environmental health; and
                            human-animal interaction and comparative medicine.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- <div><img src="static/img/vet-resources.jpg" style="width: 100vw;" /></div>
<div class="ps-page--simple">
    <div class="ps-section--shopping ps-shopping-cart resources-listing">
        <div class="ps-container">
            <div class="resources-wrapper">
                <div class="resource-header d-flex justify-content-between">
                    <h1 class="">Online Resources</h1>
                </div>
                <div class="row resource-row" data-masonry='{"percentPosition": true }'>
                    <div class="col-md-4 resource-outer-card">
                        <div class="card resource-card">
                            <div class="resource-header">
                                <h3>Career Resources</h3>
                            </div>
                            <div class="body">
                                <ul>
                                    <li>
                                        <a href="https://myvetlife.avma.org/current-student/your-career/student-externship-locator">Student externship locator</a>
                                        <p>A resource from AVMA that allows you to search for externships by state, special interest, school or organization.</p>
                                    </li>
                                    <li>
                                        <a href="https://www.icva.net/">International Council for Veterinary Assessment</a>
                                        <p>The ICVA develops veterinary licensing exams including the NAVLE and species-specific exams.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.virmp.org/">Veterinary Internship & Residency Matching Program</a>
                                        <p>From the American Association of Veterinary Clinicians.</p>
                                    </li>
                                    <li>
                                        <a href="https://www.avma.org/professionaldevelopment/career/vcc/pages/default.aspx">AVMA Veterinary Career Center</a>
                                        <p>Includes job postings, resume postings, and other career resources.</p>
                                    </li>
                                    <li>
                                        <a href="http://jobs.aavmc.org/careerdev/">AAVMC Career Development</a>
                                        <p>Includes career tips, career coaching, resume writing, and a career store.</p>
                                    </li>
                                    <li>
                                        <a href="https://www.aphis.usda.gov/aphis/banner/careers">APHIS Careers Program</a>
                                        <p>Jobs available from the USDA's Animal and Plant Health Inspection Service (APHIS).</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 resource-outer-card">
                        <div class="card resource-card">
                            <div class="resource-header">
                                <h3>Featured Online Resources</h3>
                            </div>
                            <div class="body">
                                <ul>
                                    <li>
                                        <a href="https://ebusiness.avma.org/aahsd/study_search.aspx">AVMA Animal Health Studies Database</a>
                                        <p>Search for veterinary clinical studies using this resource, launched by the AVMA in June 2016.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.merckvetmanual.com/mvm/index.jsp">Merck Veterinary Manual</a>
                                        <p>A foundational resource in veterinary reference.</p>
                                    </li>
                                    <li>
                                        <a href="http://consultant.vet.cornell.edu/">CONSULTANT</a>
                                        <p>A diagnostic tool from the Cornell University College of Veterinary Medicine. Allows searching by diagnosis or signs and
                                        contains a list of "new and noteworthy" articles.</p>
                                    </li>
                                    <li>
                                        <a href="https://animaldrugsatfda.fda.gov/">Animal Drugs @ FDA (Green Book)</a>
                                        <p>A reference work containing information about drugs used in veterinary medicine. Includes trade names, active
                                        ingredients, and patent information.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.fda.gov/AnimalVeterinary/default.htm">FDA Center for Veterinary Medicine</a>
                                        <p>Includes information for both consumers and veterinarians focusing on safety, health, science, and research.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.vin.com/">Veterinary Information Network (VIN)</a>
                                        <p>A frequently-used portal to veterinary information and research online. Free registration available to veterinary
                                        medical students.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.ivis.org/home.asp">International Veterinary Information Service (IVIS)</a>
                                        <p>An online publisher of veterinary books and proceedings. Free to veterinarians, veterinary students, and animal health
                                        professionals.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 resource-outer-card">
                        <div class="card resource-card">
                            <div class="resource-header">
                                <h3>Online Resources - General Reference</h3>
                            </div>
                            <div class="body">
                                <ul>
                                    <li>
                                        <a href="http://www.library.illinois.edu/vex/vetabbrev.htm">Veterinary Abbreviations and Acronyms Guide</a>
                                        <p>Veterinary Abbreviations and Acronyms Guide - from the University of Illinois at Urbana-Champaign.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.ahc.umn.edu/rar/refvalues.html">Reference Values for Laboratory Animals</a>
                                        <p>Reference Values for Laboratory Animals - includes hematology and clinical values, from the University of Minnesota.</p>
                                    </li>
                                    <li>
                                        <a href="http://cal.vet.upenn.edu/projects/ssclinic/refdesk/refrange.htm">Reference Ranges</a>
                                        <p>Reference Ranges - for small mammals, birds, and reptiles; from the University of Pennsylvania.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 resource-outer-card">
                        <div class="card resource-card">
                            <div class="resource-header">
                                <h3>Calculators</h3>
                            </div>
                            <div class="body">
                                <ul>
                                    <li>
                                        <a href="http://www.medcalc.com/">MedCalc: Online Clinical Calculators</a>
                                        <p>Not specific to veterinary medicine.</p>
                                    </li>
                                    <li>
                                        <a href="http://csu-cvmbs.colostate.edu/vth/veterinarians/Pages/emergency-drug-calculator.aspx">Veterinary Emergency Drug Calculator</a>
                                        <p>From Colorado State University.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 resource-outer-card">
                        <div class="card resource-card">
                            <div class="resource-header">
                                <h3>Online Resources - Large Animals</h3>
                            </div>
                            <div class="body">
                                <ul>
                                    <li>
                                        <a href="http://vanat.cvm.umn.edu/">Breeds of Livestock</a>
                                        <p>Breeds of Livestock - from Oklahoma State University.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.cvmbs.colostate.edu/vetneuro/">Beef Cattle</a>
                                        <p>Beef Cattle - from the American College of Veterinary Surgeons Kansas State University Libraries, part of the
                                        Agricultural Network Information Center (AgNIC).</p>
                                    </li>
                                    <li>
                                        <a href="http://www.ucd.ie/vetanat/images/image.html">Animal Genomics and Improvement Laboratory</a>
                                        <p>Animal Genomics and Improvement Laboratory - includes genome mapping results in cattle, swine, and sheep; from the USDA.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.vetmed.wsu.edu/VAn308/gross-page.htm">Horse Genome Project</a>
                                        <p>Horse Genome Project - from the University of Kentucky.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 resource-outer-card">
                        <div class="card resource-card">
                            <div class="resource-header">
                                <h3>Online Resources - Anatomy</h3>
                            </div>
                            <div class="body">
                                <ul>
                                    <li>
                                        <a href="http://vanat.cvm.umn.edu/">Veterinary Anatomy</a>
                                        <p>Veterinary Anatomy - from the University of Minnesota.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.cvmbs.colostate.edu/vetneuro/">Veterinary Educational Tools</a>
                                        <p>Veterinary Educational Tools - from Colorado State University.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.ucd.ie/vetanat/images/image.html">Veterinary Dissection Images</a>
                                        <p>Veterinary Dissection Images - illustrations from University College Dublin.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.vetmed.wsu.edu/VAn308/gross-page.htm">Gross Anatomy of a Dog</a>
                                        <p>Gross Anatomy of a Dog - from Washington State University.</p>
                                    </li>
                                    <li>
                                        <a href="http://vetmed.illinois.edu/courses/imaging_anatomy/index.html">Imaging Anatomy</a>
                                        <p>Imaging Anatomy - from the University of Illinois at Urbana-Champaign.</p>
                                    </li>
                                    <li>
                                        <a href="http://smallanimal.vethospital.ufl.edu/clinical-services/support-services/diagnostic-imaging/digital-radiography-dr/radiographic-anatomy/">Radiographic Anatomy</a>
                                        <p>Radiographic Anatomy - from the UF Small Animal Hospital.</p>
                                    </li>
                                    <li>
                                        <a href="https://visgar.vetmed.ufl.edu/">Visual Guides of Animal Reproduction (VisGAR)</a>
                                        <p>Visual Guides of Animal Reproduction (VisGAR) - originally known as the DROST project, hosted by UF.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 resource-outer-card">
                        <div class="card resource-card">
                            <div class="resource-header">
                                <h3>Online Resources - One Health</h3>
                            </div>
                            <div class="body">
                                <ul>
                                    <li>
                                        <a href="https://www.avma.org/KB/Resources/Reference/Pages/One-Health.aspx/">One Health - It's All Connected</a>
                                        <p>One Health - It's All Connected - the AVMA's One Health Page.</p>
                                    </li>
                                    <li>
                                        <a href="https://www.onehealthcommission.org//">One Health Commission</a>
                                        <p>One Health Commission - a non-profit working on One Health communication and research; includes links to books, white
                                        papers, presentations, videos.</p>
                                    </li>
                                    <li>
                                        <a href="https://www.onehealthcommission.org//">CDC One Health</a>
                                        <p>CDC One Health -includes information on zoonotic diseases, history of One Health, case studies, domestic and foreign One
                                        Health activities, bibliography of recent articles and government publications.</p>
                                    </li>
                                    <li>
                                        <a href="http://www.cdc.gov/onehealth/">One Health Case Studies</a>
                                        <p>From AAVMC and APTR, these case studies cover microbial influences on health and disease; environmental health; and
                                        human-animal interaction and comparative medicine.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@push('after-scripts')
    {{-- <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script> --}}
    <script defer src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script defer src="{{ asset('assets/js/online-resources.js') }}"></script>
@endpush