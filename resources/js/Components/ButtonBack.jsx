import { Link } from '@inertiajs/react';
export default function ButtonBack() {
    return(
        <>
            <Link className="flex item-center justify-center bg-gray-200 rounded-md shadown-md p-2 hover:bg-gray-300"
                href={route('shortener')}
            >
                Atras
            </Link>
        </>
    )
}
