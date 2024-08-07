import { Link, router } from '@inertiajs/react'
import ArrowIcon from "./Icon/ArrowIcon"
import TrashIcon from "./Icon/TrashIcon"

export default function tableDefault({shorteners}) {
    return (
        <table className="w-full">
            <thead className="w-full">
                <tr className="font-semibold w-full text-gray-600">
                    <td>#</td>
                    <td>Code</td>
                    <td>Url</td>
                    <td className="flex justify-end">Acciones</td>
                </tr>
            </thead>
            <tbody className="w-full">
                {
                    shorteners.map(element =>
                        <tr className="text-sm text-gray-700 hover:bg-gray-200 border-b border-gray-300" key={element.id}>
                            <td>{element.id}</td>
                            <td>{element.code_url}</td>
                            <td>{element.origin_url}</td>
                            <td className="flex item-center justify-center">
                                <Link href={route('shortener.redirect', element.code_url)}>
                                    <ArrowIcon className="w-6 cursor-pointer mr-3 hover:text-blue-800"/>
                                </Link>
                                <TrashIcon onClick={()=> router.delete(route('shortener.destroy', element))} className="w-6 cursor-pointer hover:text-red-800"/>
                            </td>
                        </tr>
                    )
                }
            </tbody>
        </table>
    )
}
