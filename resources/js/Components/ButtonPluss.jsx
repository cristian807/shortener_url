import { Link } from '@inertiajs/react';
export default function ButtonPluss(params) {
    return(
        <>
            <Link className="flex item-center justify-center bg-gray-200 rounded-md shadown-md px-2 py-1 hover:bg-gray-300"
                href={route('shortener.create')}
            >
                +
            </Link>
        </>
    )
}
