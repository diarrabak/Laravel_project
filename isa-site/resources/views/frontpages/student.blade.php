@extends('layouts.app')

@section('content')

<div class="header">
    <img class="department-image" src="/storage/images/admission.jpg" alt='Admission to the programs' />

    <h1 class="department depart-header">Admissions</h1>

</div>

<h2 class="apply">Who can apply?</h2>
<div class="row">
    <p class="col-12">
        Admission to the ISA is by selection. The following candidates are accepted:
    </p>
    <ul>
        <li>
            New baccalaureate holders
        </li>
        <li>
            Former high school graduates
        </li>
        <li>
            Technician Certificate holders
        </li>
        <li>
            Professionals holding a Baccalaureate or a Technician's Certificate
        </li>
        <li>
            Professionals and non-professionals with DUT (University Diploma in Technologies) from ISA.
        </li>
    </ul>
    <p class="col-12">
        Students of other nationalities may be admitted as well.
    </p>
</div>
<div class="row">
    <h2 class="col-12">Scholarship</h2>
    <p class="col-12">
        Once admitted, the application fees (receipt) are 5,000 F CFA non-refundable.
        Tuition fees are 50,000 F CFA for nationals and 300,000 F CFA for foreigners.
    </p>
</div>
<div class="row documents">

    <div class="col-12 ">
        <h2>Documents for local students</h2>

        <ul>
            <li>
                An application form addressed to the Director General of the Institute of Applied Sciences (ISA) specifying in order of preference the two options chosen by the candidate.
                This request must be stamped at 200 F CFA, signed with the surname and first names of the candidate;
            </li>
            <li>
                A certified true copy of the Baccalaureate certificate or any recognized equivalent diploma;
            </li>
            <li>
                A certified true copy of the Baccalaureate transcript;
            </li>
            <li>
                An extract of the birth certificate or a supplementary judgment in lieu thereof;
            </li>
            <li>
                A certificate of nationality;
            </li>
            <li>
                Five thousand (5,000) CFA francs for filing fees (non-refundable).
            </li>
        </ul>
    </div>
    <div class="col-12">
        <h2> Documents for International students</h2>

        <ul>
            <li>
                An application form addressed to the Director General of the Institute of Applied Sciences (ISA) specifying in order of preference the two options chosen by the candidate.
                This request must be stamped at 200 F CFA, signed with the surname and first names of the candidate;
            </li>
            <li>
                A certified true copy of the diploma (Baccalaureate or BT);
            </li>
            <li>
                A certified true copy of the Baccalaureate or BT transcript;
            </li>
            <li>
                An extract of the birth certificate or a supplementary judgment in lieu thereof;
            </li>
            <li>
                A certificate of nationality;
            </li>
            <li>
                Fifteen thousand (15,000) F CFA for filing fees (non-refundable);
            </li>
            <li>
                A certificate of payment of study costs.
            </li>
        </ul>
    </div>
</div>
@endsection