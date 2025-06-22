import { Button } from '@/components/ui/button';
import { DropdownMenu, DropdownMenuContent, DropdownMenuItem, DropdownMenuSeparator, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { Input } from '@/components/ui/input';
import { cn } from '@/lib/utils';
import { type NavItem, type User } from '@/types';
import { Link } from '@inertiajs/react';
import { Heart, LogOut, LogIn, UserPlus, Search, ShoppingCart, User as UserIcon } from 'lucide-react';
import AppLogo from '../app-logo';

interface NavbarProperties {
    navLinks: NavItem[];
    userMenuItems: NavItem[];
    user: User;
    url: string;
}

function Navbar({ navLinks, userMenuItems, user, url }: NavbarProperties) {
    return (
        <div className="hidden w-full items-center justify-between lg:flex">
            {/* Application TechGear Logo */}
            <Link href="/dashboard" prefetch className="flex items-center space-x-2">
                <AppLogo />
            </Link>

            {/* Centered Navigation Links */}
            <nav className="flex items-center space-x-8">
                {navLinks.map((link) => (
                    <Link
                        key={link.title}
                        href={link.href}
                        className={cn(
                            'border-b-2 text-black transition-colors dark:text-white',
                            url === link.href ? 'border-black' : 'border-transparent hover:border-black dark:hover:border-white',
                        )}
                    >
                        {link.title}
                    </Link>
                ))}
            </nav>

            {/* Right side: Search, Icons, and User Menu */}
            <div className="flex items-center space-x-4">
                <div className="relative">
                    <Input
                        type="search"
                        placeholder="What exactly are you looking for?"
                        className="w-72 rounded-xl border border-gray-300 bg-gray-100 pr-10 text-black placeholder:text-gray-500 focus:bg-white dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:placeholder:text-neutral-400 dark:focus:bg-neutral-700"
                    />
                    <Search className="pointer-events-none absolute top-1/2 right-3 h-5 w-5 -translate-y-1/2 text-gray-500" />
                </div>

                {/* Wishlist Button */}
                <Button variant="ghost" size="icon" className="h-10 w-10">
                    <Heart className="size-5" />
                </Button>

                {/* Shopping Cart Button */}
                <Button variant="ghost" size="icon" className="relative h-10 w-10">
                    <ShoppingCart className="size-5" />
                    <span className="absolute -top-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-xs text-white">
                        2
                    </span>
                </Button>

                {user && (
                    <DropdownMenu>
                        <DropdownMenuTrigger asChild>
                            <Button variant="ghost" size="icon" className="relative">
                                {user?.profile_photo_url ? (
                                    <img src={user.profile_photo_url} alt={user.name} className="h-11 w-11 rounded-full object-cover" />
                                ) : (
                                    <UserIcon className="size-7 rounded-full bg-red-500 p-1 text-white" />
                                )}
                            </Button>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent className="bg-grey-800/80 w-60 border-none text-black backdrop-blur-sm dark:text-white" align="end">
                            {userMenuItems.map((item) => (
                                <DropdownMenuItem
                                    key={item.title}
                                    asChild
                                    className={cn(
                                        'group cursor-pointer',
                                        'hover:bg-black/90 hover:text-white focus:bg-black/90 focus:text-white',
                                        'dark:hover:bg-white dark:hover:text-black dark:focus:bg-white dark:focus:text-black',
                                    )}
                                >
                                    <Link href={item.href} className="flex items-center">
                                        {item.icon && (
                                            <item.icon
                                                className={cn(
                                                    'mr-2 h-5 w-5',
                                                    // Icon turns black on hover/focus in dark mode
                                                    'group-hover:text-white group-focus:text-white',
                                                    'dark:group-hover:text-black dark:group-focus:text-black',
                                                )}
                                            />
                                        )}
                                        <span>{item.title}</span>
                                    </Link>
                                </DropdownMenuItem>
                            ))}
                            <DropdownMenuSeparator className="bg-gray-500/50" />
                            <DropdownMenuItem
                                asChild
                                className={cn(
                                    'group cursor-pointer',
                                    'hover:bg-black/90 hover:text-white focus:bg-black/90 focus:text-white',
                                    'dark:hover:bg-white dark:hover:text-black dark:focus:bg-white dark:focus:text-black',
                                )}
                            >
                                <Link href="/logout" method="post" as="button" className="flex w-full items-center">
                                    <LogOut
                                        className={cn(
                                            'mr-2 h-5 w-5',
                                            'group-hover:text-white group-focus:text-white',
                                            'dark:group-hover:text-black dark:group-focus:text-black',
                                        )}
                                    />
                                    <span>Log Out</span>
                                </Link>
                            </DropdownMenuItem>
                        </DropdownMenuContent>
                    </DropdownMenu>
                )}
                {!user && (
                    <>
                        <Button variant="outline" size="sm" asChild>
                            <Link href={route('login')} className="mr-4">
                                <LogIn className="mr-2 h-4 w-4" />
                                Log In
                            </Link>
                        </Button>
                        <Button variant="outline" size="sm" asChild>
                            <Link href={route('register')} className="mr-4">
                                <UserPlus className="mr-2 h-4 w-4" />
                                Register
                            </Link>
                        </Button>
                    </>
                )}
            </div>
        </div>
    );
}

export default Navbar;
